<?php

namespace App\Middleware;

use PDO;
use Slim\Http\Request;
use Slim\Http\Response;


class IpFilter
{
    protected $db ;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    //invoke call when use a class as a function
    public function __invoke(Request $request ,Response $response , $next)
    {
        if(!$this->allowed($_SERVER['remote_address'])){
            return $response->withStatus(401)->write('denied');
        }

        return $next($request , $response);
    }

    protected function allowed($ip)
    {
        //ips can get from database
        $ips = ['::1' , '127.0.0.1'];

        return !in_array($ip , $ips);
    }
}