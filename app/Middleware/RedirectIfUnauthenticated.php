<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class RedirectIfUnauthenticated
{
    //invoke call when use a class as a function
    public function __invoke(Request $request ,Response $response , $next)
    {
        if(!isset($_SESSION['user_id'])){
            $response =  $response->withRedirect('http://localhost/sigin');
        }

        return $next($request , $response);
    }    
}