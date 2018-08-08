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



class HomeController extends BaseController
{
    public function home(){
    	
    	//ARMO EL ARREGLO DE DATOS QUE DEBO PASARLE A LA VISTA
    	$data=Array();
    	
    	
    	//FIN DE ARMO EL ARREGLO DE DATOS QUE DEBO PASARLE A LA VISTA
        return view('home')->with('data', $data);
    }

}