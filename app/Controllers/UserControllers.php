<?php

namespace App\Controllers;

use PDO;
use App\Models\User;

class UserControllers extends Controller {

    public function index($request , $response)
    {
        $users = $this->container->db->query('SELECT * FROM user')->fetchAll(PDO::FETCH_CLASS , User::class);

        return $this->views->render($response , 'users/index.twig' , compact('users'));

    }

    public function show()
    {
        echo "single topics";
    }

}