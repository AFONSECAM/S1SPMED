<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ValidarRol
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
        $permisos = User::$permisos[Auth::user()->rol->nomRol];
        
        $request_url = $request->getRequestUri();              
        $url = explode("?", $request_url)[0];                                

        $filtro = array_filter($permisos, function($item) use ($url, $request){            
            if(strpos($url, $item["url"]) !== false){                
                if($request->isMethod($item["method"])){
                    if($item["identica"] === true){
                        if($item["url"] == $url){
                            return true;
                        }
                    }else{
                        return true;
                    }                    
                }
            }            
            return false;
        });
            
        if(count($filtro) == 0){
            return redirect("home");
        }

        return $next($request);
    }
}
