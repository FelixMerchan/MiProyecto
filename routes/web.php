<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function()
{
    
    Route::get('administracion','HomeController@administracion');
    Route::resource('administracion/roles', 'RolController');
    Route::get('administracion/roles_ajax', 'RolController@roles_ajax');    
    
    Route::resource('administracion/usuarios', 'UserController');
    Route::get('administracion/usuarios_ajax', 'UserController@usuarios_ajax');    
    Route::get('/hola',['middleware' => 'edad', function()
    {
        
        return "ingresaste";
        
    }]);

    Route::post('administracion/buscar_cedula_usuario', ['as'=>'buscar_cedula_usuario','uses'=>'UserController@buscar_cedula_usuario']);
    Route::post('administracion/buscar_email_usuario', ['as'=>'buscar_email_usuario','uses'=>'UserController@buscar_email_usuario']);

    Route::get('administracion/cargar_roles', 'UserController@cargar_roles')->name('cargar_roles');    
    
});

Route::get('token', 'ApiController@show_token'); 

Route::get('posts', 'WebServiceController@obtener_posts');    
Route::get('detalle/{id}', 'WebServiceController@buscar_post')->name('detalle');

Route::get('formulario', 'WebServiceController@mostrar_formulario'); 
Route::post('guardar_post', 'WebServiceController@guardar_post')->name('guardar_post');     

Route::get('formulario/actualizar', 'WebServiceController@mostrar_formulario2'); 
Route::put('actualizar/post', 'WebServiceController@actualizar_post')->name('actualizar');
