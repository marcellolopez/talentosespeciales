<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\TipoDiscapacidad;
use App\Models\FormaTrabajo;
use App\Models\Postulacion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;
use  URL, Route, DB;


class IndexEmpresaController extends Controller
{

    public function index(){
        return view('index');
    }

    public function register(){
        return view('empresa.register');
    } 

    public function profile(){
        $regiones = Region::all();
        $user = Auth::guard('empresa')->user();

        return view('empresa.profile', compact('user','regiones'));
    }       

    public function viewCreatePostulation(){
        $formas_trabajo = FormaTrabajo::all();
        return view('empresa.createPostulation', compact('formas_trabajo'));
    } 

    public function createPostulation(Request $request){
        $validator = $this->validateCreatePostulation($request);    

        /*Si sale algun error retornamos errores a la ruta de la postulación*/
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } 

        $postulacion = new Postulacion();
        $postulacion->titulo = $request->titulo;
        $postulacion->empresa_id = Auth::guard('empresa')->user()->id;
        $postulacion->descripcion = $request->descripcion;
        $postulacion->fecha_inicio = $request->fecha_inicio;
        $postulacion->fecha_termino = $request->fecha_termino;
        $postulacion->forma_trabajo_id = $request->forma_trabajo_id; 
        $postulacion->save();
        return redirect()->route('/empresa/viewPostulation/{id}', [$postulacion->id])
        ->with(
            [
                'alertify'=> 'La postulación fue creada con exito',
                'titulo' => 'Postulación'
            ]);
    } 

    public function viewPostulation($id){
        $postulacion = Postulacion::find($id);
        return view('empresa.showPostulation', compact('postulacion'));
    }     

    public function viewPostulationList(Request $request){
        return view('empresa.postulationList');
    }
    public function viewPostulationListTable(Request $request){
        $postulacion = Postulacion::find($request->id);
        

        $data = Postulacion::from('postulaciones as p')
        ->select(
            'p.id',
            'titulo',
            'descripcion',
            DB::raw('DATE_FORMAT(fecha_inicio, "%d-%m-%Y") as fecha_inicio'),
            DB::raw('DATE_FORMAT(fecha_termino, "%d-%m-%Y") as fecha_termino'),
            'f.forma_trabajo' 
        )
        ->join('forma_trabajo as f', 'p.forma_trabajo_id', 'f.id')
        ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="'.route('/empresa/viewPostulation/{id}',['id' => $row->id]).'" class="edit btn btn-success btn-sm">Ver</a>';// <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    function validateCreatePostulation(Request $request){
        $rules =array(
            'titulo' => 'required|max:50',
            'descripcion' => 'required|min:100|max:1000',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'forma_trabajo_id' => 'required'
        );
        $messages = [
            'titulo.required' => 'El título es requerido',
            'titulo.max' => 'El título debe contener un máximo de 50 caracteres',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.min' => 'La descripción debe contener un mínimo de 100 caracteres',
            'descripcion.max' => 'La descripción debe contener un máximo de 1000 caracteres',
            'fecha_inicio.required' => 'La fecha de inicio es requerida',
            'fecha_termino.required' => 'La fecha de término es requerida',
            'forma_trabajo_id.required' => 'La forma de trabajo es requerida',
        ];
        return Validator::make($request->all(),$rules,$messages);
    }     
}
