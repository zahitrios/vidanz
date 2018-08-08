<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol as Rol;

class RolesController extends Controller
{


    public function default(){

    	$data["roles"]= $this->index();    	
    	$data["displayMensaje"]="none";
    	$data["mensaje"]="";

    	return view('roles')->with('data', $data);
    }

    public function index(){ //DEVUELVE TODO
    	$rol = Rol::all();
    	return $rol;
    }


    public function formEdit($id){

    	$rol = Rol::find($id);
    	//dump($rol);

    	$data["rol"]= $rol;
    	

    	return view('editRol')->with('data', $data);
    }

    public function show(Rol $rol)//DEVUELVE EL Rol CORRESPONDIENTE A LA LLAVE PRIMARIA
	{
	    return $rol;
	}

    public function store(Request $request) //PARA ALMACENAR
	{
	    try{
	    	Rol::Create($request->all());
        	$data["roles"]= $this->index();
	    	

	    	$data["mensaje"]="Registro insertado correctamente";
	    	$data["displayMensaje"]="block";

	    	return view('roles')->with('data', $data);
    	}
    	catch(\Exception $e){

	    	$data["roles"]= $this->index();
	    	

	    	$data["mensaje"]="Ocurrió un error al insertar el registro";
	    	$data["displayMensaje"]="block";

	    	return view('roles')->with('data', $data);
	    }
	}

	public function update(Request $request) //PARA ACTUALIZAR
	{
		$rol = Rol::find($request['idrol']);        
        $rol->nombre = $request['nombre'];
        $rol->descripcion = $request['descripcion'];
        

	    try{
	    	//$rol->fill($request->all())->save();
	    	$rol->save();
	        
	    	$data["roles"]= $this->index();
	    	

	    	$data["mensaje"]="Registro actualizado correctamente";
	    	$data["displayMensaje"]="block";

	    	return view('roles')->with('data', $data);
	    }
	    catch(\Exception $e){

	    	$data["roles"]= $this->index();
	    	

	    	$data["mensaje"]="Ocurrió un error al actualizar este registro, revise las llaves foraneas";
	    	$data["displayMensaje"]="block";

	    	return view('roles')->with('data', $data);
	    }
	}

	public function destroy(Request $request,$idrol)//ELIMINA UN REGISTRO
	{
		
		$rol = Rol::find($idrol);

	    try{
	    	$rol->delete();
	        return redirect()->route('roles'); 
	    }
	    catch(\Exception $e){
	    	
	    	$data["roles"]= $this->index();
	    	

	    	$data["mensaje"]="Ocurrió un error al elminiar este registro, revise las llaves foraneas";
	    	$data["displayMensaje"]="block";

	    	return view('roles')->with('data', $data);
	    }	
	}
}
