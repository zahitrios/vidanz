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
        $moduloActual=strtolower($moduloActual);


        if($moduloActual=="" || $moduloActual=="home" || $moduloActual=="logout")
            return true;

        //VALIDO QUE LA RUTA SEA UN MODULO
        $queryDB = DB::table('modulos')
                ->select('*')                
                ->where('nombre','=',$moduloActual)
                ->get();

        if(count($queryDB)<=0)//ESTÁ ENTRANDO A UNA SUBRUTA QUE YA FUE VALIDADA
            return true;


        //HAGO EL QUERY PARA SABER SI EL USUARIO TIENE EL MODULO
        $queryDB = DB::table('rol_has_modulos')
                ->select('*')                
                ->join('rol','idrol','rol_has_modulos.rol_idrol')
                ->join('usuario','idrol','usuario.rol_idrol')
                ->join('modulos','idmodulos','modulos_idmodulos')
                ->where(DB::raw("md5(idusuario)"),'=',$idUserMd5)                
                ->where('modulos.nombre','=',$moduloActual)
                ->get();
        
        if(count($queryDB)>0) //SI TIENE PERMISOS
            return true;

        //NO TIENE PERMISOS
        return false;

        return true;

    }


}
