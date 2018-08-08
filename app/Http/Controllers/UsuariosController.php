<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;


use App\Models\Usuario as Usuario;
use App\Models\Rol as Rol;



class UsuariosController extends Controller
{
    public function default(Request $request){

    	if(Session::get('data') == ""){
    		$data=array ();
    		$data["usuarios"]= $this->index();    		
    		$data["roles"]= $this->getAllRoles();
    		$data["displayMensaje"]="none";
    		$data["mensaje"]="";
    	}
    	else{
    		$data=Session::get('data');
    	}

    	return view('usuarios')->with('data', $data);
    }

    public function formEdit($idusuario){

    	$Usuario = Usuario::find($idusuario);    	
    	$data["usuario"]= $Usuario;
    	
    	$data["roles"]= $this->getAllRoles();

    	return view('editUsuario')->with('data', $data);
    }

    public function update(Request $request){

    	$Usuario = Usuario::find($request['idusuario']);  

        $Usuario->nombre = $request['nombre'];
        $Usuario->user = $request['user'];
        $Usuario->rol_idrol = $request['rol_idrol'];
        
        if($request['pss']!=""){
        	$Usuario->pss = md5($request['pss']);
        }
       	
        
	    try{
	    	$Usuario->save();

	    	$data=array ();
	    	$data["usuarios"]= $this->index();
	    	
	    	$data["roles"]= $this->getAllRoles();

	    	$data["mensaje"]="Usuario modificado correctamente";
	    	$data["displayMensaje"]="block";

	    	return Redirect::route('usuarios')->with( ['data' => $data] );
	    }
	    catch(\Exception $e){
	    	
	    	$data=array ();
	    	$data["usuarios"]= $this->index();
	    	
	    	$data["roles"]= $this->getAllRoles();

	    	$data["mensaje"]="Ocurrió un error al modificar el usuario";
	    	$data["displayMensaje"]="block";

	    	return Redirect::route('usuarios')->with( ['data' => $data] );
	    }
    }

    public function index(){ //DEVUELVE TODO
    	$usuarios = Usuario::all()->sortBy('idusuario');
    	return $usuarios;
    }


   

    public function getAllRoles(){
    	$roles = Rol::all();
    	return $roles;
    }

    public function store(Request $request) //PARA ALMACENAR
	{
	    try{
	    	$user = new Usuario;
			$user["nombre"] = $request["nombre"];
			$user["user"] = $request["user"];			
			$user["rol_idrol"] = $request["rol_idrol"];			
			$user["pss"] = md5($request["pss"]);		
			$user["active"] = $request["active"];
			
			$user->save();

        	$data=array ();
	    	$data["usuarios"]= $this->index();
	    	
	    	$data["roles"]= $this->getAllRoles();

	    	$data["mensaje"]="Usuario insertado correctamente";
	    	$data["displayMensaje"]="block";

	    	return Redirect::route('usuarios')->with( ['data' => $data] );
    	}
    	catch(\Exception $e){
    		
	    	$data=array ();
	    	$data["usuarios"]= $this->index();
	    	
	    	$data["roles"]= $this->getAllRoles();
	    	
	    	$data["mensaje"]="Ocurrió un error al insertar el usuario";
	    	$data["displayMensaje"]="block";

	    	return Redirect::route('usuarios')->with( ['data' => $data] );
	    }
	}

	public function disable(Request $request,$idusuario){
		try{
	    	
	    	$user = Usuario::find($idusuario);
	    	$user["active"] = 0;
	    	$user->save();

        	$data=array ();
	    	$data["usuarios"]= $this->index();
	    	
	    	$data["roles"]= $this->getAllRoles();

	    	$data["mensaje"]="Usuario deshabilitado correctamente";
	    	$data["displayMensaje"]="block";

	    	return Redirect::route('usuarios')->with( ['data' => $data] );
    	}
    	catch(\Exception $e){
    		
	    	$data=array ();
	    	$data["usuarios"]= $this->index();
	    	
	    	$data["roles"]= $this->getAllRoles();
	    	
	    	$data["mensaje"]="Ocurrió un error al modificar el usuario";
	    	$data["displayMensaje"]="block";

	    	return Redirect::route('usuarios')->with( ['data' => $data] );
	    }
	}

	public function enable(Request $request,$idusuario){
		try{
	    	
	    	$user = Usuario::find($idusuario);
	    	$user["active"] = 1;
	    	$user->save();

        	$data=array ();
	    	$data["usuarios"]= $this->index();
	    	
	    	$data["roles"]= $this->getAllRoles();

	    	$data["mensaje"]="Usuario habilitado correctamente";
	    	$data["displayMensaje"]="block";

	    	//return view('usuarios')->with('data', $data);
	    	return Redirect::route('usuarios')->with( ['data' => $data] );
    	}
    	catch(\Exception $e){
    		
	    	$data=array ();
	    	$data["usuarios"]= $this->index();
	    	
	    	$data["roles"]= $this->getAllRoles();
	    	
	    	$data["mensaje"]="Ocurrió un error al modificar el usuario";
	    	$data["displayMensaje"]="block";

	    	return Redirect::route('usuarios')->with( ['data' => $data] );
	    }
	}

}
