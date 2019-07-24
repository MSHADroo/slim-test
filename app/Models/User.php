<?php

namespace App\Models;

class User
{

    public function fullName()
    {
        return "$this->first_name $this->last_name";
    }

    public function getFormattedBalance()
    {
        return '$' . number_format($this->balance, 2);
    }

}