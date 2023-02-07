<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Usuario;
use App\Models\Empresa;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\TipoDiscapacidad;
use App\Models\Postulacion;
use App\Models\UsuarioPostulacion;
use App\Models\Educacion;
use App\Models\Laboral;
use App\Models\Grado;
use App\Models\OtraExperiencia;
use Illuminate\Support\Facades\Hash;
use Auth, URL, Route, DB;
use Illuminate\Support\Facades\Validator;
use Freshwork\ChileanBundle\Rut;

class IndexController extends Controller
{
    public function index(){
        return view('index_new');
    }

    public function register(){
        return view('usuario.register');
    } 

    public function insertRegister(Request $request){
        
        $validator = $this->validateInsertRegister($request);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } 
        $user = new Usuario();
        $user->rut      = $request->rut;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save()){
            return redirect('usuario/login')->with('success', '¡Listo! Te has registrado con éxito');
        }
        
    } 

    public function profile(){
        $user = Auth::guard('web')->user();
        $regiones = Region::all()->pluck('region_nombre', 'region_id');

        $helper = new HelperController();
        if($user->region_id != null){
            $comunas = Comuna::select('comuna_id','comuna_nombre')
                    ->where('p.region_id',$user->region_id)
                    ->join('provincias as p','comunas.provincia_id', 'p.provincia_id')
                    ->join('regiones as r','p.region_id', 'r.region_id')
                    ->orderBy('comuna_nombre')
                    ->get();
            return view('usuario.profile', compact('user','regiones', 'comunas'));
        }
        else{
            $comunas = ['0' => '...'];
            return view('usuario.profile', compact('user','regiones', 'comunas'));
        }
        
        
    } 

    public function updateProfile(Request $request){

        $validator = $this->validateUpdateProfile($request); 
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } 

        $user = Usuario::find(Auth::guard('web')->user()->id);
        $user->nombres      = $request->nombres;
        $user->apellido_paterno      = $request->apellido_paterno;
        $user->apellido_materno      = $request->apellido_materno;
        $user->fecha_nacimiento      = $request->fecha_nacimiento;
        $user->telefono      = $request->telefono;
        $user->direccion      = $request->direccion;
        $user->comuna_id      = $request->comuna;
        $user->region_id      = $request->region;

        if($user->save()){
            return redirect()->route('/usuario/profile')->with(
            [
                'alertify'=> 'Los datos del postulante fueron actualizados con éxito',
                'titulo' => 'Postulante'
            ]);
        }
    } 
 
    public function disabilities(){
        
        $tipo_discapacidad = TipoDiscapacidad::whereIn('id',[1,2,3,4,5])->get();
        $array_preguntas = array();
        foreach ($tipo_discapacidad as $tipo ) {
            $preguntas = Pregunta::where('tipo_discapacidad_id',$tipo->id)->orderBy('orden')->get();

            if($preguntas){
                foreach ($preguntas as $pregunta) {
                    $array_preguntas[$tipo->id][$pregunta->id]['pregunta_id'] = $pregunta->id;
                    $array_preguntas[$tipo->id][$pregunta->id]['pregunta'] = $pregunta->pregunta;
                    $array_preguntas[$tipo->id][$pregunta->id]['tipo_respuesta_id'] = $pregunta->tipo_respuesta_id;
                }
                
            }
        }
        $respuestas = Respuesta::all();
        $array_respuestas = array();
        foreach ($respuestas as $respuesta ) {
            $array_respuestas[$respuesta->tipo_respuesta_id][$respuesta->orden]['respuesta'] = $respuesta->respuesta;
            $array_respuestas[$respuesta->tipo_respuesta_id][$respuesta->orden]['id'] = $respuesta->id;
        }

        return view('usuario.disabilities', compact('tipo_discapacidad', 'array_preguntas', 'array_respuestas'));
    }     

    public function viewPostulationList(){
        $user = Usuario::where('id',Auth::guard('web')->user()->id)
        ->select(
            "nombres",
            "apellido_paterno",
            "apellido_materno",
            "fecha_nacimiento",
            "email",
            "telefono",
            //"celular",
            "direccion"
        )
        ->first()
        ->toArray();

        if(in_array(null, $user)){
            return redirect('usuario/profile')->with('warning', 'Para poder revisar ofertas, debes completar tus datos personales');
        }
        else{
            $postulaciones = Postulacion::select(
                'postulaciones.*',
                'e.razon_social as nombre_empresa'
            )
            ->join('empresas as e', 'e.id', 'postulaciones.empresa_id')
            ->simplePaginate(20);
            return view('usuario.postulationList', compact('postulaciones'));           
        }
    }    

    public function viewMyPostulationList(){
        $user = Usuario::where('id',Auth::guard('web')->user()->id)
        ->select(
            "nombres",
            "apellido_paterno",
            "apellido_materno",
            "fecha_nacimiento",
            "email",
            "telefono",
            //"celular",
            "direccion"
        )
        ->first()
        ->toArray();

        if(in_array(null, $user)){
            return redirect('usuario/profile')->with('warning', 'Para poder revisar ofertas, debes completar tus datos personales');
        }
        else{
            $postulaciones = Postulacion::select(
                'postulaciones.*',
                DB::raw("DATE_FORMAT(up.fecha,'%d-%m-%y') as fecha_postulacion"),
                'e.razon_social as nombre_empresa'
            )
            ->join('usuario_postulacion as up', 'up.postulacion_id', 'postulaciones.id')
            ->join('empresas as e', 'e.id', 'postulaciones.empresa_id')
            ->where('up.usuario_id', Auth::guard('web')->user()->id)
            ->orderBy('up.fecha','DESC')
            ->simplePaginate(20);
            return view('usuario.myPostulationList', compact('postulaciones'));           
        }
    }  

    public function searchPostulationList(Request $request){
        

        $postulaciones = Postulacion::where("titulo", "LIKE", "%{$request->keyword}%")->simplePaginate(20);
        //dd($postulaciones);
        return view('searchPostulationList', compact('postulaciones'));           

    } 

    public function ajaxViewPostulation(Request $request){
        $user = Auth::guard('web')->user();
        $postulacion = Postulacion::find($request->id);
        $usuario_postulacion = UsuarioPostulacion::where('usuario_id',$user->id)->where('postulacion_id',$request->id)->first();
        $postulado = ($usuario_postulacion == null ? false : true);
        $arrayPostulacion = [
            'descripcion'    => $postulacion->descripcion,
            'forma_trabajo'  => $postulacion->forma_trabajo->forma_trabajo,
            'tipo_contrato'  => $postulacion->tipo_contrato->tipo_contrato,
            'tipo_jornada'  => $postulacion->tipo_jornada->tipo_jornada,
            'postulado'    => $postulado
        ];
        return response()->json(['status' => '200', 'postulacion' => (object) $arrayPostulacion]);
    } 

    public function ajaxSavePostulation(Request $request){
        //dd($request->all());
        $user = Auth::guard('web')->user();
        $usuario_postulacion = new UsuarioPostulacion();
        $usuario_postulacion->usuario_id = $user->id;
        $usuario_postulacion->postulacion_id = $request->id;
        $usuario_postulacion->fecha = now();
        if($usuario_postulacion->save()){
            return response()->json(['status' => '200']);
        }
        else{
            return response()->json(['status' => '500']);
        }
    } 


    public function education(){
        $user = Auth::guard('web')->user();
        $educacion = Educacion::where('usuario_id', $user->id)->orderBy('fecha_inicio','desc')->get();

        $grados = Grado::all();
        return view('usuario.experience.education', compact('educacion','grados'));   
    } 

    public function insertEducation(Request $request){
        $user = Auth::guard('web')->user();
        $educacion = new Educacion();
        $educacion->usuario_id = $user->id;
        $educacion->titulo = $request->titulo;
        $educacion->institucion_educativa = $request->institucion_educativa;
        $educacion->grado_id = $request->grado;
        $educacion->descripcion = $request->descripcion;
        $educacion->fecha_inicio = $request->fecha_inicio;
        $educacion->fecha_termino = $request->fecha_termino;
        if($educacion->save()){
            return redirect()->route('/usuario/education')->with(
            [
                'alertify'=> 'Los datos fueron guardados con éxito',
                'titulo' => 'Postulante'
            ]);
        }
    } 

    public function work(){
        $user = Auth::guard('web')->user();
        $laboral = Laboral::where('usuario_id', $user->id)->orderBy('fecha_inicio','desc')->get();
        return view('usuario.experience.work', compact('laboral'));   
    } 

    public function insertWork(Request $request){
        $user = Auth::guard('web')->user();
        $laboral = new laboral();
        $laboral->usuario_id = $user->id;
        $laboral->cargo = $request->cargo;
        $laboral->empresa = $request->empresa;
        $laboral->descripcion = $request->descripcion;
        $laboral->fecha_inicio = $request->fecha_inicio;
        $laboral->fecha_termino = $request->fecha_termino;
        if (isset($request->trabajo_actual)) {
            $laboral->trabajo_actual = $request->trabajo_actual;
        }
        if($laboral->save()){
            return redirect()->route('/usuario/work')->with(
            [
                'alertify'=> 'Los datos fueron guardados con éxito',
                'titulo' => 'Postulante'
            ]);
        }
    } 


    public function other(){
        $user = Auth::guard('web')->user();
        $otras = OtraExperiencia::where('usuario_id', $user->id)->orderBy('fecha_inicio','desc')->get();
        return view('usuario.experience.other', compact('otras'));   
    } 

    public function insertOther(Request $request){
        $user = Auth::guard('web')->user();
        $otra = new OtraExperiencia();
        $otra->usuario_id = $user->id;
        $otra->nombre = $request->nombre;
        $otra->institucion = $request->institucion;
        $otra->descripcion = $request->descripcion;
        $otra->fecha_inicio = $request->fecha_inicio;
        $otra->fecha_termino = $request->fecha_termino;
        if($otra->save()){
            return redirect()->route('/usuario/other')->with(
            [
                'alertify'=> 'Los datos fueron guardados con éxito',
                'titulo' => 'Postulante'
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('empresa')->logout();
     
        return redirect('/');
    }

    public function unauthorized(Request $request)
    {

     
        return view('unauthorized');
    }


    function validateUpdateProfile(Request $request){
        $rules =array(
            'nombres' => 'required|min:3|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'direccion' => 'required|max:100',
            'comuna' => 'required',
            'region' => 'required',
        );
        $messages = [
            'nombres.required' => 'El título es requerido',
            'nombres.max' => 'El título debe contener un máximo de 100 caracteres',
            'telefono.required' => 'El teléfono es requerido',
            'comuna.required' => 'La dirección es requerida',
            'comuna.required' => 'La comúna es requerida',
            'region.required' => 'La región es requerida',
        ];
        return Validator::make($request->all(),$rules,$messages);
    }   

    function validateInsertRegister(Request $request){
        $rules =array(
            'rut' => 'required|cl_rut|min:8|max:10',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|min:6',
        );
        $messages = [
            'rut.required' => 'El rut es requerido',
            'email.unique' => 'El email ya se encuentra registrado',
        ];
        return Validator::make($request->all(),$rules,$messages);
    }   


    public function createUser(){
        $user =  User::find(1);
        //$user->rut = '16366326-0';
        $user->nombres = 'Jorge';
        $user->apellido_paterno = 'Soto';
        $user->apellido_materno = 'Ríos';
        $user->fecha_nacimiento = '1987-02-27 00:00:00';
        $user->password =Hash::make('123456');
        $user->email = 'postulante@talentosespeciales.cl';
        $user->telefono = '974163322';
        $user->celular = '974163322';
        $user->direccion = 'Pasaje blablabla';
        $user->save();
        dd($user);
        return view('usuario.profile', compact('regiones'));
    }    

    public function createEmpresa(){
        $empresa =  new Empresa();
        $empresa->rut = '16366326';
        $empresa->razon_social = 'Empresa Nombre';
        $empresa->password =Hash::make('123456');
        $empresa->email = 'empresa@talentosespeciales.cl';
        $empresa->telefono = '974163322';
        $empresa->celular = '974163322';
        $empresa->direccion = 'Pasaje blablabla';
        $empresa->sitio_web = 'www.google.cl';
        $empresa->save();
        dd($empresa);
    }             

}
