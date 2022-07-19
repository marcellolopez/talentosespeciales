<?php

use Illuminate\Support\Facades\Route;

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

//cambiar color #f78701
//agregar accordion mis capacidades


/*usuario*/
//experiencia laboral
//mis postulaciones
//nuevas postulaciones


/*empresa*/
//login
/**
 * debe poder tener varias cuentas para una sola empresa asociada y tambien asociar roles.
 */
//datos de la empresa
//crear oferta laboral
//historial de ofertas 
	//ver oferta
	//editar oferta
	//ver postulantes a la oferta
		//ingresar a su perfil
		//descargar cv

/**
 * Rutas generales
 */

Route::get('/', 'IndexController@index');

//Página ingreso no autorizado
Route::get('/unauthorized', 'IndexController@unauthorized')->name('/unauthorized');

/**
 * Postulantes
 */
Route::get('/usuario/login', 'Auth\LoginController@login');

Route::post('/usuario/login', 'Auth\LoginController@authenticate')->name('/usuario/login');

Route::get('/usuario/register', 'IndexController@register');

Route::get('/usuario/logout', 'IndexController@logout');

Route::get('/usuario/profile', 'IndexController@profile')->name('/usuario/profile')->middleware('canAccessPostulante');

Route::get('/usuario/disabilities', 'IndexController@disabilities')->name('/usuario/disabilities')->middleware('canAccessPostulante');

Route::get('/usuario/viewPostulationList', 'IndexController@viewPostulationList')->name('/usuario/viewPostulationList');
Route::post('/usuario/ajaxViewPostulation', 'IndexController@ajaxViewPostulation')->name('/usuario/ajaxViewPostulation');




/**
 * Empresas
 */
Route::get('/empresa/login', 'Auth\LoginEmpresaController@login');

Route::post('/empresa/login', 'Auth\LoginEmpresaController@authenticate')->name('/empresa/login');

Route::get('/empresa/profile', 'IndexEmpresaController@profile')->name('/empresa/profile');

Route::get('/empresa/viewCreatePostulation', 'IndexEmpresaController@viewCreatePostulation')->name('/empresa/viewCreatePostulation');

Route::post('/empresa/createPostulation', 'IndexEmpresaController@createPostulation')->name('/empresa/createPostulation');

Route::get('/empresa/viewPostulation/{id}', 'IndexEmpresaController@viewPostulation')->name('/empresa/viewPostulation/{id}');

Route::get('/empresa/viewPostulationList', 'IndexEmpresaController@viewPostulationList')->name('/empresa/viewPostulationList');
Route::get('/empresa/viewPostulationListTable', 'IndexEmpresaController@viewPostulationListTable')->name('/empresa/viewPostulationListTable');









Route::get('/usuario/createUser', 'IndexController@createUser');
Route::get('/usuario/createEmpresa', 'IndexController@createEmpresa');

Route::get('getComunas', 'HelperController@getComunas');