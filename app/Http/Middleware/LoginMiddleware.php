<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->get('logged') != true) { //SI NO HAY SESIÓN ACTIVA
          return redirect()->route('login.form'); 
        }
        
        //VALIDO QUE EL USUARIO TENGA PERMISOS DE ENTRAR AL MODULO QUE ESTA HACIENDO REQUEST
        if($this->validaUsuarioModulo()){
            return $next($request);
        }
        else{
            return redirect()->route('handsup');    
        }
    }


    public function validaUsuarioModulo(){

        $idUserMd5=session()->get('idUser');
        //$moduloActual=Route::getFacadeRoot()->current()->uri();
        $moduloActual=Route::getFacadeRoot()->current()->action["as"];
        $moduloActual=strtoupper($moduloActual);


        if($moduloActual=="" || $moduloActual=="home" || $moduloActual=="logout")
            return true;

        //VALIDO QUE LA RUTA SEA UN MODULO
        // $queryDB = DB::table('modulos')
        //         ->select('*')                
        //         ->where('nombre','=',$moduloActual)
        //         ->get();

        // if(count($queryDB)<=0)//ESTÁ ENTRANDO A UNA SUBRUTA QUE YA FUE VALIDADA
        //     return true;


        // //HAGO EL QUERY PARA SABER SI EL USUARIO TIENE EL MODULO
        // $queryDB = DB::table('rol_has_modulos')
        //         ->select('*')                
        //         ->join('tUser','rModulePosition.id_position','tUser.id_position')
        //         ->where(DB::raw("md5(id_user)"),'=',$idUserMd5)                
        //         ->where('id_module','=',$moduloActual)
        //         ->get();
        
        // if(count($queryDB)>0) //SI TIENE PERMISOS
        //     return true;

        // //NO TIENE PERMISOS
        // return false;

        return true;

    }


}
