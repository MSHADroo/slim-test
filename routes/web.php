<?php

//$app->get('/{name}', function ($request, $response, $args) {
////    return $this->nothing;
//
//    return $response->getBody()->write("Hello, " . $args['name']);
//});

use App\Controllers\TopicControllers;
use App\Middleware\IpFilter;
use App\Middleware\RedirectIfUnauthenticated;


//set global middleware for all request
$app->add(new IpFilter($container['db']));


$app->group('/topics' , function(){
   $this->get('' , TopicControllers::class . ':index');

   //set specific route middleware
   $this->get('/{id}' , TopicControllers::class . ':show')->add(new RedirectIfUnauthenticated());
});