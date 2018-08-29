<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

use App\Models\Clase as Clase;

class ClasesController extends Controller
{
    public function default(Request $request){    	
    	
    	$data=array ();
    	$data["clases"]= $this->index();    	
    	$data["displayMensaje"]="none";
    	$data["mensaje"]="";


    	return view('clases')->with('data', $data);    	
    }

     public function index(){ //DEVUELVE TODO
    	$rol = Clase::all();
    	return $rol;
    }

    public function store(Request $request){
    	try{
	    	Clase::Create($request->all());
        	$data["clases"]= $this->index();
	    	

	    	$data["mensaje"]="Registro insertado correctamente";
	    	$data["displayMensaje"]="block";

	    	return redirect('clases');
    	}
    	catch(\Exception $e){

	    	$data["clases"]= $this->index();
	    	

	    	$data["mensaje"]="Ocurrió un error al insertar el registro";
	    	$data["displayMensaje"]="block";

	    	return view('clases')->with('data', $data);
	    }
    }

    public function formEdit($idclase){

    	$clase = Clase::find($idclase);
    	//dump($rol);

    	$data["clase"]= $clase;
    	

    	return view('editClase')->with('data', $data);
    }

    public function update(Request $request){
    	$clase = Clase::find($request['idclase']);        
        $clase->nombreClase = $request['nombreClase'];

        try{
	    	
	    	$clase->save();
	        
	    	$data["clases"]= $this->index();
	    	

	    	$data["mensaje"]="Calse modificada correctamente";
	    	$data["displayMensaje"]="block";

	    	return view('clases')->with('data', $data);
	    }
	    catch(\Exception $e){

	    	$data["clases"]= $this->index();
	    	

	    	$data["mensaje"]="Ocurrió un error al editar el registro";
	    	$data["displayMensaje"]="block";

	    	return view('clases')->with('data', $data);
	    }

    }


}
