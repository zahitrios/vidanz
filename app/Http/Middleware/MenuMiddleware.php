<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\DB;
use App\Models\tUser as tUser;
use App\Models\tUser as rModulePosition;

class MenuMiddleware
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
        $menus=Array();
        $idUserMd5=session()->get('idUser');       
        session()->forget('menus');

        //HAGO EL QUERY DE LOS MENUS
        $menusDB = DB::table('modulos')
                ->select('modulos.idmodulos','modulos.nombre','modulos.class')
                ->join('rol_has_modulos','modulos.idmodulos','rol_has_modulos.modulos_idmodulos')
                ->join('rol','rol_has_modulos.rol_idrol','rol.idrol')
                ->join('usuario','rol.idrol','usuario.rol_idrol')
                ->where(DB::raw("md5(idusuario)"),'=',$idUserMd5)
                ->get();

        $menusDBJson = json_decode($menusDB, true);
       
        foreach($menusDBJson as $key => $menu){ //SI SE ENCONTRÓ EL USUARIO
            $menus[$menu["idmodulos"]]["label"] = $menu["nombre"];        
            $menus[$menu["idmodulos"]]["class"] = $menu["class"];        
        }

        session()->put('menus', $menus);
        
        return $next($request);
    }
}
