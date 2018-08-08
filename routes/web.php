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


//HOME
	Route::get('home', array('as' => 'home','uses' => 'HomeController@home'))->middleware('loginMiddleware'); //HOME