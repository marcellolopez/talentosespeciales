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

## Ver disabilities
Route::get('/usuario/disabilities', [IndexController::class, 'disabilities'])
->name('/usuario/disabilities')->middleware('canAccessPostulante');

## Guardar diabilities
Route::post('/usuario/saveDisabilities', [IndexController::class, 'saveDisabilities'])
->name('/usuario/saveDisabilities')->middleware('canAccessPostulante');

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
