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
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ModulesController extends BaseController
{
    
    
    public function addModule(){        
        $label= Input::post('label');
        $class= Input::post('class');

        $insert=DB::table('modulos')->insert(
            ['nombre' => $label, 'class' => $class]
        );

        return redirect()->route('modulos');

    }


    public function editModule(Request $request){
        
        $idmodulos = $request->input('idmodulos');
        $idrol = $request->input('id_position');
        $type = $request->input('type');
        $delete=0;
        $insert=0;

        //PRIMERO BORRO LA RELACIÓN EN CASO DE EXISTIR (PARA NO INSERTAR DOBLE Y NO TENER QUE VALIDAR) Y DESPUES EVALUO SI SE DEBE DE INSERTAR
        $delete=DB::table('rol_has_modulos')
            ->where([
                ['modulos_idmodulos', '=', $idmodulos],
                ['rol_idrol', '=', $idrol],
            ])            
            ->delete();

        if($type == "true"){
            $insert=DB::table('rol_has_modulos')->insert(
                ['modulos_idmodulos' => $idmodulos, 'rol_idrol' => $idrol]
            );
        }

        if($delete || $insert)
            echo "El módulo fue actualizado correctamente";
        else
            echo "Ocurrió un error al actualizar el módulo";
    }


    public function default(){
    	
    
    	//HAGO EL QUERY DE LAS POSICIONES
    	$positionsDB = DB::table('rol')
	                ->select('idrol','nombre')                
	                ->get();
        $positionsDBJson = json_decode($positionsDB, true);
        foreach($positionsDBJson as $i => $k){
        	$positions[$k["nombre"]]=$k["idrol"];
        }
        
        
		//HAGO EL QUERY DE LOS MÓDULOS
		$modulosDB = DB::table('modulos')
	                ->select('modulos.idmodulos','modulos.nombre','modulos.class')                
	                ->get();
        $modulosDBJson = json_decode($modulosDB, true);


        foreach($modulosDBJson as $key => $modulo){ 
            $modulos[$key]["idmodulos"]=$modulo["idmodulos"];
            $modulos[$key]["nombre"]=$modulo["nombre"];
            $modulos[$key]["class"]=$modulo["class"];

            foreach($positions as $label => $position){ //A CADA MÓDULO LE PONGO TODAS LAS POSICIONES
            	$modulos[$key]["positions"][$position]["label"]=$label;
            	

            	//BUSCO SI HAY RELACION ENTRE ESTA POSICION position Y EL MODULO
            	$rol_has_modulosDB = DB::table('rol_has_modulos')
					                ->select('*')
					                ->where('modulos_idmodulos','=',$modulo["idmodulos"])
					                ->where('rol_idrol','=',$position)
					                ->get();
				if(count($rol_has_modulosDB)===0){
					$modulos[$key]["positions"][$position]["selected"]=false;	
				}
				else{
            		$modulos[$key]["positions"][$position]["selected"]=true;
            	}
            }
           	
            
        }

        $data["modulos"]=$modulos;

    	
    	
    	//FIN DE ARMO EL ARREGLO DE DATOS QUE DEBO PASARLE A LA VISTA
        return view('modules')->with('data', $data);
    }

}