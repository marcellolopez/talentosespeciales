<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\TipoDiscapacidad;
use App\Models\Postulacion;
use Illuminate\Support\Facades\Hash;
use Auth, URL, Route;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function register(){
        return view('usuario.register');
    } 

    public function profile(){
        $regiones = Region::all()->pluck('region_nombre', 'region_id');
        $user = Auth::user();
        return view('usuario.profile', compact('user','regiones'));
    } 

    public function updateProfile(Request $request){

        $validator = $this->validateUpdateProfile($request); 
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } 
        return redirect()->route('/usuario/profile')->with(
            [
                'alertify'=> 'Los datos del postulante fueron actualizados con éxito',
                'titulo' => 'Postulante'
            ]);
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
        );
        $messages = [
            'nombres.required' => 'El título es requerido',
            'nombres.max' => 'El título debe contener un máximo de 100 caracteres',
        ];
        return Validator::make($request->all(),$rules,$messages);
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
        $postulaciones = Postulacion::simplePaginate(20);
        return view('usuario.postulationList', compact('postulaciones'));
    }    

    public function ajaxViewPostulation(Request $request){
        $postulacion = Postulacion::find($request->id);
        return response()->json(['status' => '200', 'descripcion' => $postulacion->descripcion]);
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

    


    public function createUser(){
        $user =  User::find(1);
        //$user->rut = '16366326-0';
        $user->nombres = 'Marcello';
        $user->apellido_paterno = 'López';
        $user->apellido_materno = 'Cáceres';
        $user->fecha_nacimiento = '1987-02-27 00:00:00';
        $user->password =Hash::make('123456');
        $user->email = 'mlc74163322@gmail.com';
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
        $empresa->email = 'mlc74163322@gmail.com';
        $empresa->telefono = '974163322';
        $empresa->celular = '974163322';
        $empresa->direccion = 'Pasaje blablabla';
        $empresa->sitio_web = 'www.google.cl';
        $empresa->save();
        dd($empresa);
    }             

}
