<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

use App\Models\Sucursal as Sucursal;

class SucursalesController extends Controller
{
    public function default(Request $request){    	
    	
    	$data=array ();
    	$data["sucursales"]= $this->index();    	
    	$data["displayMensaje"]="none";
    	$data["mensaje"]="";


    	return view('sucursales')->with('data', $data);    	
    }

     public function index(){ //DEVUELVE TODO
    	$sucursales = Sucursal::all();
    	return $sucursales;
    }

    public function store(Request $request){
    	try{
	    	Sucursal::Create($request->all());
        	$data["sucursales"]= $this->index();
	    	

	    	$data["mensaje"]="Registro insertado correctamente";
	    	$data["displayMensaje"]="block";

	    	return view('sucursales')->with('data', $data);
    	}
    	catch(\Exception $e){

	    	$data["sucursales"]= $this->index();
	    	

	    	$data["mensaje"]="Ocurrió un error al insertar el registro".$e;
	    	$data["displayMensaje"]="block";

	    	return view('sucursales')->with('data', $data);
	    }
    }

    public function formEdit($idsucursal){

    	$sucursal = Sucursal::find($idsucursal);
    	//dump($rol);

    	$data["sucursal"]= $sucursal;
    	

    	return view('editSucursal')->with('data', $data);
    }

    public function update(Request $request){
    	$sucursal = Sucursal::find($request['idsucursal']);        
        
        $sucursal->nombre = $request['nombre'];
        $sucursal->direccion = $request['direccion'];
        $sucursal->telefonoUno = $request['telefonoUno'];
        $sucursal->telefonoDos = $request['telefonoDos'];

        try{
	    	
	    	$sucursal->save();
	        
	    	$data["sucursales"]= $this->index();
	    	

	    	$data["mensaje"]="Sucursal modificada correctamente";
	    	$data["displayMensaje"]="block";

	    	return view('sucursales')->with('data', $data);
	    }
	    catch(\Exception $e){

	    	$data["sucursales"]= $this->index();
	    	

	    	$data["mensaje"]="Ocurrió un error al editar el registro";
	    	$data["displayMensaje"]="block";

	    	return view('sucursales')->with('data', $data);
	    }

    }


}
