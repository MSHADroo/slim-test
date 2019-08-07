<?php

namespace App\Controllers;

class TopicControllers extends Controller {

    public function index($request , $response)
    {
        return $this->views->render($response , 'topics/index.twig');
        echo "all topics";
    }

    public function show()
    {
        echo "single topics";
    }

}