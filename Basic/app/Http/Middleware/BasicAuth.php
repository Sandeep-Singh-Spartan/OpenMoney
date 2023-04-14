<?php

namespace App\Http\Middleware;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Closure;
class BasicAuth extends BaseMiddleware {

    public function handle(Request $request,Closure $next){
        if(Auth::guard('api')->check()){
            $user = Auth::guard('api')->user();
            $request['user'] =$user;
            return $next($request);
        }else{
            return response(['status'=>'unauthenticated'],400);
        }
    }

}
