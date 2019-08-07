<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 27/07/2019
 * Time: 11:40 PM
 */

namespace App\Validation\Rules;

use Respect\Validation\Exceptions\ValidationExceptions;

class EmailAvailableExceptions extends ValidationExceptions
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Email is already taken'
        ]
    ];

}