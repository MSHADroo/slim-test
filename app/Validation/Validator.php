<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 27/07/2019
 * Time: 11:33 PM
 */


namespace App\Validation;

class Validator{

    protected $errors;

    public function validate($request , array $rules)
    {
        foreach($rules as $field => $rule){
            try{
                $rule->setName(ucfirst($field))->assert($request->getParam($field));
            }catch(NestedValidationException $e){
                $this->errors[$field] = $e->getMessage();
            }
        }

        $_SESSION['errors'] = $this->errors;

        return $this;
    }
}