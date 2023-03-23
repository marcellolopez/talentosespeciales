<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginEmpresaController;
use App\Http\Controllers\IndexEmpresaController;
use App\Http\Controllers\HelperController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('phpinfo', function () {
   return phpinfo();
})
->name('phpinfo');

//cambiar color #f78701



/**
 * ajustes postulante
 * 
 * 
 * 
 * 
 * 
 * Sacar descripción en education OK
 * 
 * no requerido descripción en laboral OK
 * 
 * no requerido descripción en otras OK
 * 
 * no desarparecer sidebar en postulaciones - postulante OK
 * colocar flechita
 * 
 * 
 * 
 * 
 * postulaciones usuario 
 * 
 * botón dejar de postular OK
 * cambiar a expirar cuando termine plazo (por hacer)
 */


/**
 * ajuste empresa
 * 
 * agregtar nombre de contacto en form empresa OK
 * agregar descreipción de la empresa OK
 * 
 * 
 * 
 * en postulación, bajar íconos y mostrar ubicación del trabajo
 * 
 * 
 * breadcums - ajustar url
 * cambiar títulos de form layout
 * 
 * agregar vacantes a oferta de empleo
 * 
 * 
 * agregar subir logo a empresa
 * investigar librería imagen cuadrada
 * 
 * 
 * agregar acciones a postulaciones
 * -ver postulacion
 * -ver postulantes
 * -editar
 * -eliminar
 * 
 * vsita postulación
 * -eliminar postulación
 * -editar postulación
 * 
 */

/* usuario */
//Jueves 24 de Noviembre
//mis postulaciones
//nuevas postulaciones
//OK
/**
 * Falta agregar preguntas
 */




//experiencia

//estudio
/**
 * institucion, 
 * título, 
 * grado,
 * año de inicio
 * año de termino
 * (ordenar por año DESC)
 * 
 * 
 * Como llamar a este campo?
 * (
 * Escolar incompleta, 
 * Escolar completa , 
 * Técnico incompleta, 
 * Técnico completa, 
 * Universidad incompleta , 
 * Universidad completa , 
 * postgrado
 * ) ordenar incompleta - completa
 */


//laboral
/**
 * año-mes (desde -|- hasta) * trabajo aquí altuaclmente (Bloquear Hasta, si se da el caso)
 * empresa, 
 * cargo, 
 * descripción del cargo
 */
//Otras experiencias
/**
 * nombre
 * nivel (básico - medio - avanzado)
 * fecha de duración
 * descripción
 */

//guardar capacidades
//usuario postular a empleo


/*empresa*/
//login
/**
 * debe poder tener varias cuentas para una sola empresa asociada y tambien asociar roles.(etapa 2)
 */
//datos de la empresa
//crear oferta laboral
    //agregar preguntas a postulaciones
//historial de ofertas 
    //ver oferta
    //editar oferta
    //ver postulantes a la oferta
        //ingresar a su perfil
        //descargar cv (2da etapa)
        //agregar comentarios de la empresa para el usuario (2da etapa)


Route::get('/', [IndexController::class, 'index']);

Route::post('/buscarEmpleo', [IndexController::class, 'searchPostulationList']);

Route::get('/unauthorized', [IndexController::class, 'unauthorized']);

Route::get('logout/', [IndexController::class, 'logout']);

/**
 * Postulantes
 */

Route::get('/usuario/login', [LoginController::class, 'login']);

Route::post('/usuario/loginForm', [LoginController::class, 'authenticate']);


/**
 * Registrar y confirmar correo
 * 
 */

Route::get('/usuario/register', [IndexController::class, 'register']);

Route::post('/usuario/register', [IndexController::class, 'insertRegister']);

Route::get('/usuario/profile', [IndexController::class, 'profile'])
->name('/usuario/profile')->middleware('canAccessPostulante');

Route::post('/usuario/profile', [IndexController::class, 'updateProfile'])->middleware('canAccessPostulante');

/**
 * al guardar, abrir popup aceptando que los datos son reales.
 * Mientras esta información no se encuentre, no podrá ingresar a nuevos empleos
 */
Route::get('/usuario/disabilities', [IndexController::class, 'disabilities'])
->name('/usuario/disabilities')->middleware('canAccessPostulante');

Route::get('/usuario/education', [IndexController::class, 'education'])
->name('/usuario/education')->middleware('canAccessPostulante');

Route::post('/usuario/education', [IndexController::class, 'insertEducation'])->middleware('canAccessPostulante');


Route::get('/usuario/work', [IndexController::class, 'work'])
->name('/usuario/work')->middleware('canAccessPostulante');

Route::post('/usuario/work', [IndexController::class, 'insertWork'])->middleware('canAccessPostulante');



Route::get('/usuario/other', [IndexController::class, 'other'])
->name('/usuario/other')->middleware('canAccessPostulante');

Route::post('/usuario/other', [IndexController::class, 'insertOther'])->middleware('canAccessPostulante');
/**
 * viewPostulationList
 * botón aviso debe contener:
 * título
 * nombre empresa
 * ubicación del trabajo
 */
Route::get('/usuario/viewPostulationList', [IndexController::class, 'viewPostulationList'])
->name('/usuario/viewPostulationList')->middleware('canAccessPostulante');
Route::get('/usuario/viewMyPostulationList', [IndexController::class, 'viewMyPostulationList'])
->name('/usuario/viewMyPostulationList')->middleware('canAccessPostulante');
Route::post('/usuario/ajaxViewPostulation', [IndexController::class, 'ajaxViewPostulation']);
Route::post('/usuario/ajaxSavePostulation', [IndexController::class, 'ajaxSavePostulation']);
Route::post('/usuario/ajaxDeletePostulation', [IndexController::class, 'ajaxDeletePostulation']);




/**
 * Empresas
 */
Route::get('/empresa/login', [App\Http\Controllers\Auth\LoginEmpresaController::class,'login'])
->name('/empresa/login');

Route::post('/empresa/loginForm', [App\Http\Controllers\Auth\LoginEmpresaController::class,'authenticate'])
->name('/empresa/loginForm');

Route::get('/empresa/profile', [IndexEmpresaController::class, 'profile'])
->name('/empresa/profile');

/**
 * viewCreatePostulation
 * Agregar tipo de contrato: A plazo fijo - Indefinido
 * Agregar jornada: Full time - Part time - Freelance - Práctica
 * Agregar checkbox de habilidades aceptadas
 * Agregrar preguntas para el postulante
 * Validar fechas en formulario
 * rango de fecha desde el inicio a 30 días después
 * 
 * 
 * Al crear postulación 24 para mnodificar título y fecha (dar aviso al crear)
 */
Route::get('/empresa/viewCreatePostulation', [IndexEmpresaController::class, 'viewCreatePostulation'])
->name('/empresa/viewCreatePostulation');

Route::post('/empresa/createPostulation', [IndexEmpresaController::class, 'createPostulation'])
->name('/empresa/createPostulation');

/**
 * viewPostulation
 * Crear vista para ver postulantes 
 */
Route::get('/empresa/viewPostulation/{id}', [IndexEmpresaController::class, 'viewPostulation'])
->name('/empresa/viewPostulation/{id}');



/**
 * agregar vista de editar publicación
 * bloquear fecha inicio
 * Bloquear el título 
 */
Route::get('/empresa/viewPostulationList', [IndexEmpresaController::class, 'viewPostulationList'])
->name('/empresa/viewPostulationList');
Route::get('/empresa/viewPostulationListTable', [IndexEmpresaController::class, 'viewPostulationListTable'])
->name('/empresa/viewPostulationListTable');









Route::get('/usuario/createUser', [IndexController::class, 'createUser']);
Route::get('/usuario/createEmpresa', [IndexController::class, 'createEmpresa']);

Route::get('getComunas', [HelperController::class, 'getComunas']);
