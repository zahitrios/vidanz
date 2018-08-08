<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Redirect;
use Auth;
use Input;
use Form;
use Session;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Html\HtmlServiceProvider;

use App\Models\Usuario as Usuario;
use Laravel\Socialite\Facades\Socialite as Socialite;
use Illuminate\Http\Request;
use Exception;


class LoginController extends BaseController
{
    
    public function formLogin(){

    	$errors = Session::get('errors');
		if(count($errors) > 0){
			$errorDisplay='block';			

			if($errors->first('general')!="")
				$displayErrorGeneral='block';
			else
				$displayErrorGeneral='none';

			if($errors->first('usuario')!="")
				$displayErrorUsuario='block';
			else
				$displayErrorUsuario='none';

			if($errors->first('password')!="")
				$displayErrorPassword='block';
			else
				$displayErrorPassword='none';
			
		}
		else{
			$errorDisplay='none';
			$displayErrorGeneral='none';
			$displayErrorUsuario='none';
			$displayErrorPassword='none';
		}

		$urlApp=url('/');
		
        return view('login', ["urlApp"=>$urlApp,"errorDisplay"=>$errorDisplay, "displayErrorGeneral"=>$displayErrorGeneral, "displayErrorUsuario"=>$displayErrorUsuario, "displayErrorPassword"=>$displayErrorPassword]);
    }


    public function doLogin(){

    	//DEFINO LAS REGLAS QUE DEBE DE TENER CADA CAMPO
		$rules = array(
		    'usuario'    => 'required', 
		    'password' => 'required' 
		);

		$customMessages = [
		    'required' => 'El :attribute es un campo requerido.'
		];

		$validator = Validator::make(Input::all(), $rules, $customMessages); //VALIDACIONES DE CAMPOS REQUERIDOS		
		if ($validator->fails()) { //FALTAN CAMPOS REQUERIDOS
		    return redirect() -> route('login.form')
		        			  -> withErrors($validator)
		        			  -> withInput(Input::except('password')); 
		}

		else { //EVALUO EL LOGIN
			
		    $userdata = array(
		        'usuario'  => Input::get('usuario'),
		        'password' => Input::get('password')
		    );

			//CREO UN OBJETO DEL MODELO Usuario
			$Usuario=new Usuario();

			//HAGO EL QUERY DEL USUARIO
			$users = $Usuario::whereRaw("user='".$userdata["usuario"]."' AND pss='".MD5($userdata['password'])."' AND active=1")->get();

			if(count($users)===0){ //NO SE ENCONTRO EL USUARIO

				$errors = new MessageBag();			   
			    $errors->add('general', 'Usuario y password incorrectos');
				return Redirect::to('login')->withErrors($errors);
			}

			else if(count($users)===1){ //SI SE ENCONTRÓ EL USUARIO

				$user=$users[0]->getAttributes();				
				session()->put('logged', true, 240);
				session()->put('userName', $user['nombre'], 240);				
				session()->put('avatar', '/assets/img/avatars/placeholder.png', 240);
				session()->put('idUser', MD5($user['idusuario']), 240);

				return Redirect::to('/'); // LO DIRIJO AL HOME
			}
		}
    }


    
    public function doLogout(){
    	
    	session()->forget('logged');
    	session()->forget('userName');
    	session()->forget('userMail');
    	session()->forget('idUser');
    	session()->forget('menus');

		return Redirect::to('/'); // LO DIRIJO AL HOME
    }

}