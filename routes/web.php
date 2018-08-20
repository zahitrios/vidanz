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

    if (session()->get('logged') === true) { //SI YA UNA HAY SESIÓN ACTIVA, LO ENVÍO A HOME
		  return redirect()->route('home'); 
	}
	else{ //SI NO HAY SESIÓN ACTIVA LO ENVÍO AL FORMULARIO DE LOGIN
		return redirect()->route('login.form'); 
	}
});


//LOGIN Y LOGOUT
	Route::get('login', array('as' => 'login.form','uses' => 'LoginController@formLogin')); //FORMULARIO DE LOGIN
	Route::post('login', array('uses' => 'LoginController@doLogin')); //INTENTA HACER LOGIN CON FORMULARIO
	Route::get('loginG', array('uses' => 'LoginController@doLoginGoogle')); //INTENTA HACER LOGIN CON GOOGLE
	Route::get('redirectGoogle', array('uses' => 'LoginController@redirectGoogle')); //DIRIGE A LA PANTALLA DE LOGIN DE GOOGLE
	Route::get('logout', array('as'=>'logout', 'uses' => 'LoginController@doLogout')); //HACE LOGOUT



//MODULES (ADMINISTRADOR DE MÓDULOS)
	Route::get('modulos', array('as' => 'modulos','uses' => 'ModulesController@default'))->middleware('loginMiddleware');
	Route::get('editModule', array('as' => 'editModulos','uses' => 'ModulesController@editModule'))->middleware('loginMiddleware');
	Route::post('addModule', array('as' => 'addModulos','uses' => 'ModulesController@addModule'))->middleware('loginMiddleware'); 


//HOME
	Route::get('home', array('as' => 'home','uses' => 'HomeController@home'))->middleware('loginMiddleware'); //HOME

//ROLES
	Route::get('roles', array('as' => 'roles','uses' => 'RolesController@default'))->middleware('loginMiddleware'); 
	Route::post('roles', array('as' => 'roles','uses' => 'RolesController@store'))->middleware('loginMiddleware'); 
	Route::get('roles/{rol}/edit', array('as' => 'roles.edit','uses' => 'RolesController@formEdit'))->middleware('loginMiddleware');
	Route::get('roles/{rol}/delete', array('as' => 'roles.delete','uses' => 'RolesController@destroy'))->middleware('loginMiddleware');
	Route::post('saveEditRol', array('as' => 'roles.saveEdit','uses' => 'RolesController@update'))->middleware('loginMiddleware');



//USUARIOS
	Route::get('usuarios',  array('as' => 'usuarios','uses' => 'UsuariosController@default'))->middleware('loginMiddleware');
	Route::post('usuarios', array('as' => 'usuarios','uses' => 'UsuariosController@store'))->middleware('loginMiddleware');
	Route::get('usuarios/{idusuario}/disable', array('as' => 'usuarios.disable','uses' => 'UsuariosController@disable'))->middleware('loginMiddleware');
	Route::get('usuarios/{idusuario}/enable', array('as' => 'usuarios.enable','uses' => 'UsuariosController@enable'))->middleware('loginMiddleware');
	Route::get('usuarios/{idusuario}/edit', array('as' => 'usuarios.edit','uses' => 'UsuariosController@formEdit'))->middleware('loginMiddleware');
	Route::post('saveEditUsuario', array('as' => 'usuarios.saveEdit','uses' => 'UsuariosController@update'))->middleware('loginMiddleware');


//CLASES
	Route::get('clases',  array('as' => 'clases','uses' => 'ClasesController@default'))->middleware('loginMiddleware');
	Route::post('clases',  array('as' => 'clases','uses' => 'ClasesController@store'))->middleware('loginMiddleware');
	Route::get('clases/{idclase}/edit', array('as' => 'clases.edit','uses' => 'ClasesController@formEdit'))->middleware('loginMiddleware');
	Route::post('saveEditClase', array('as' => 'clases.saveEdit','uses' => 'ClasesController@update'))->middleware('loginMiddleware');


//SUCURSALES
	Route::get('sucursales',  array('as' => 'sucursales','uses' => 'SucursalesController@default'))->middleware('loginMiddleware');
	Route::post('sucursales',  array('as' => 'sucursales','uses' => 'SucursalesController@store'))->middleware('loginMiddleware');
	Route::get('sucursales/{idsucursal}/edit', array('as' => 'sucursales.edit','uses' => 'SucursalesController@formEdit'))->middleware('loginMiddleware');
	Route::post('saveEditSucursal', array('as' => 'sucursales.saveEdit','uses' => 'SucursalesController@update'))->middleware('loginMiddleware');




//HANDSUP
	Route::get('handsup', array('as' => 'handsup','uses' => 'HandsupController@default')); 
	