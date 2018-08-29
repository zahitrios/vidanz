<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Lead as Lead;
use App\Models\Usuario as Usuario;
use App\Models\Alumno as Alumno;
use App\Models\Clase as Clase;
use App\Models\AlumnoHasClase as AlumnoHasClase;



class AlumnosController extends Controller
{
    public function default(Request $request){    	
    	
    	if(Session::get('data') == ""){
	    	$data=array ();
	    	$data["alumnos"]= $this->index();
	    	$data["clases"]= $this->getClases();
	    	$data["displayMensaje"]="none";
	    	$data["mensaje"]="";
	    	$data["edit"]=0;
	        $data["usuario_idusuario"]=$this->getIdUsuario();
	    }
	    else{
    		$data=Session::get('data');
    	}

    	return view('alumnos')->with('data', $data);    	
    }


    public function index(){ //DEVUELVE TODO
    	$alumnosToReturn=array ();
    	$alumnos = Alumno::all()->sortByDesc("fechaIngreso");

    	foreach($alumnos as $key => $alumno){
    		$clases = DB::table('clase')
                ->select('*')
                ->join('alumno_has_clase','alumno_has_clase.clase_idclase','clase.idclase')                
                ->orderBy('nombreClase')
                ->where('alumno_idalumno','=',$alumno->idalumno)
                ->get();
        	$clases = json_decode($clases, true);
        	$alumno["clases"]=$clases;
    	}

    	return $alumnos;
    }

    public function formEdit($idalumno){
    	$data=array ();
    	$data["alumnos"]= $this->index();
    	$data["clases"]= $this->getClases();
    	$data["displayMensaje"]="none";
    	$data["mensaje"]="";
    	$data["edit"]=1;
        $data["usuario_idusuario"]=$this->getIdUsuario();
        
        $alumno = Alumno::find($idalumno); 
       	$clases = DB::table('clase')
            ->select('*')
            ->join('alumno_has_clase','alumno_has_clase.clase_idclase','clase.idclase')                
            ->orderBy('nombreClase')
            ->where('alumno_idalumno','=',$idalumno)
            ->get();
    	$clases = json_decode($clases, true);
    	
    	$alumno["clases"]=$clases;
        $data["alumno"]=$alumno;

        return view('alumnos')->with('data', $data); 
    }

    public function update(Request $request){

    	$alumno = Alumno::find($request['idalumno']);  
        $alumno->nombre = $request['nombre'];
        $alumno->telefono = $request['telefono'];
        $alumno->correo = $request['correo'];
        $alumno->facebook = $request['facebook'];
        $alumno->notas = $request['notas'];
        try{
	    	$alumno->save();

	    	//BORRO LAS RELACIONES CON LAS CLASES
	    	$clases = DB::table('alumno_has_clase')            
            ->where('alumno_idalumno','=',$request['idalumno'])
            ->delete();
    		//BORRO LAS RELACIONES CON LAS CLASES

            //DOY DE ALTA LAS CLASES
    		$input = Input::all();	        
	        foreach($input as $k => $req){	        	
	        	if(strrpos($k,"claseInscrita_")===0){	        		
	        		$relacion=new AlumnoHasClase;
	        		$relacion["alumno_idalumno"]=$request['idalumno'];
	        		$relacion["clase_idclase"]=$req;
	        		$relacion->save();
	        	}
	        }
	        //DOY DE ALTA LAS CLASES

	    	$data=array ();
	    	$data["alumnos"]= $this->index();
	    	$data["clases"]= $this->getClases();
	    	$data["mensaje"]="Alumno modificado correctamente";
    		$data["displayMensaje"]="block";
	    	$data["edit"]=0;
	        $data["usuario_idusuario"]=$this->getIdUsuario();

    		return Redirect::route('alumnos')->with( ['data' => $data] );
	    }
	    catch(\Exception $e){
	    	$data=array ();
	    	$data["alumnos"]= $this->index();
	    	$data["clases"]= $this->getClases();
	    	$data["mensaje"]="Ocurrió un error al modificar al alumno".$e;
    		$data["displayMensaje"]="block";
	    	$data["edit"]=0;
	        $data["usuario_idusuario"]=$this->getIdUsuario();
    		return Redirect::route('alumnos')->with( ['data' => $data] );
	    }

    }


    public function associate($idlead){

    	$data=array ();
    	$data["alumnos"]= $this->index();
    	$data["clases"]= $this->getClases();
    	$data["displayMensaje"]="none";
    	$data["mensaje"]="";
    	$data["edit"]=2;
        $data["usuario_idusuario"]=$this->getIdUsuario();
        $data["idlead"]=$idlead;

        $lead = Lead::find($idlead); 
        $data["lead"]=$lead;

        return view('alumnos')->with('data', $data); 
    }

    public function store(Request $request){
    	try{    	
    		$alumno=Alumno::Create($request->all());
    		
	        $input = Input::all();
	        
	        foreach($input as $k => $req){	        	
	        	if(strrpos($k,"claseInscrita_")===0){	        		
	        		$relacion=new AlumnoHasClase;
	        		$relacion["alumno_idalumno"]=$alumno->idalumno;
	        		$relacion["clase_idclase"]=$req;
	        		$relacion->save();
	        	}
	        }
	        $data=array ();
	    	$data["alumnos"]= $this->index();
	    	$data["clases"]= $this->getClases();
	    	$data["mensaje"]="Alumno insertado correctamente";
    		$data["displayMensaje"]="block";
	    	$data["edit"]=0;
	        $data["usuario_idusuario"]=$this->getIdUsuario();
    		return Redirect::route('alumnos')->with( ['data' => $data] );
    	}
    	catch(\Exception $e){
    		
	    	$data=array ();
	    	$data["alumnos"]= $this->index();
	    	$data["clases"]= $this->getClases();
	    	$data["mensaje"]="Ocurrió un error al insertar al alumno".$e;
    		$data["displayMensaje"]="block";
	    	$data["edit"]=0;
	        $data["usuario_idusuario"]=$this->getIdUsuario();
	        

	    	//return view('usuarios')->with('data', $data);    	
	    	return Redirect::route('alumnos')->with( ['data' => $data] );
	    }
    }

    public function getClases(){
    	$clases = Clase::all();
    	return $clases;
    }

    public function getIdUsuario(){        
        $idUserMd5=session()->get('idUser');

        $query = DB::table('usuario')
                ->select('idusuario')                
                ->where(DB::raw("md5(idusuario)"),'=',$idUserMd5)
                ->get();
        $result = json_decode($query, true);
        $result=$result[0];
       
        
        return $result["idusuario"];
    }
}