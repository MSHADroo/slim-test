<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 27/07/2019
 * Time: 11:40 PM
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule
{
    public function validate($input)
    {
        //TODO check and return true or false
        return User::where('email', $input)->count() === 0;
    }

}