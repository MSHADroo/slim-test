<?php

namespace App\Controllers;

use Interop\Container\ContainerInterface;

abstract class Controller
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function render404($response){
        return $this->container->view->render($response->withStatus(404) , 'errors/404.twig');
    }

    public function __get($property)
    {
        if($this->container->{$property}){
            return $this->container->{$property};
        }
    }
}