<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Lead as Lead;
use App\Models\Usuario as Usuario;

class LeadsController extends Controller
{
    public function default(Request $request){    	
    	
    	$data=array ();
    	$data["leads"]= $this->index();    	
    	$data["displayMensaje"]="none";
    	$data["mensaje"]="";
        $data["usuario_idusuario"]=$this->getIdUsuario();

    	return view('leads')->with('data', $data);    	
    }

     public function index(){ //DEVUELVE TODO
    	$leads = Lead::all()->sortByDesc("fechaRegistro");;
    	return $leads;
    }

    public function store(Request $request){
    	try{
	    	Lead::Create($request->all());
        	$data["leads"]= $this->index();
	        $data["usuario_idusuario"]=$this->getIdUsuario();

	    	$data["mensaje"]="Lead insertado correctamente";
	    	$data["displayMensaje"]="block";

	    	return view('leads')->with('data', $data);
    	}
    	catch(\Exception $e){

	    	$data["leads"]= $this->index();
            $data["usuario_idusuario"]=$this->getIdUsuario();

	    	$data["mensaje"]="Ocurrió un error al insertar el lead".$e;
	    	$data["displayMensaje"]="block";

	    	return view('leads')->with('data', $data);
	    }
    }

    public function formEdit($idlead){

    	$lead = Lead::find($idlead);
    	//dump($rol);

    	$data["lead"]= $lead;

    	return view('editLead')->with('data', $data);
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

    public function destroy($idlead){//ELIMINA UN REGISTRO
        
        $lead = Lead::find($idlead);   

        try{
            $lead->delete();
            $data["leads"]= $this->index();
            $data["usuario_idusuario"]=$this->getIdUsuario();
            $data["mensaje"]="Lead eliminado correctamente";
            $data["displayMensaje"]="block";

            return view('leads')->with('data', $data);            
        }
        catch(\Exception $e){
            
            $data["leads"]= $this->index();
            $data["usuario_idusuario"]=$this->getIdUsuario();
       
            $data["mensaje"]="El lead no puede ser eliminado porque pertenece a un usuario";
            $data["displayMensaje"]="block";

            return view('leads')->with('data', $data);
        }

    }

    public function update(Request $request){

    	$lead = Lead::find($request['idlead']);        
        
        $lead->nombre = $request['nombre'];
        $lead->telefono = $request['telefono'];
        $lead->correo = $request['correo'];
        $lead->notas = $request['notas'];
        $lead->facebook = $request['facebook'];

        try{
	    	
	    	$lead->save();
	        
	    	$data["leads"]= $this->index();
            $data["usuario_idusuario"]=$this->getIdUsuario();
	    	
	    	$data["mensaje"]="Lead modificado correctamente";
	    	$data["displayMensaje"]="block";

	    	return view('leads')->with('data', $data);
	    }
	    catch(\Exception $e){

	    	$data["leads"]= $this->index();
            $data["usuario_idusuario"]=$this->getIdUsuario();
	   
	    	$data["mensaje"]="Ocurrió un error al editar el lead";
	    	$data["displayMensaje"]="block";

	    	return view('leads')->with('data', $data);
	    }

    }


}
