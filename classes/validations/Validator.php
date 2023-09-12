<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce Validator.php
 * 
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad 
 */

namespace validations;

/**
 * @TODO   Documentation
 *
 * @author Mohammad Safaeirad
 * @since  4/20/2023
 *
 *
use validations\ValidationInterface;
we can use ValidationInterface directly without  use validations\ValidationInterface;
because they are in the same box(namesace)
 */
 
require_once 'ValidationInterface.php';
require_once 'Email.php';
require_once 'Max.php';
require_once 'Numeric.php';
require_once 'Required.php';
require_once 'RequiredImage.php';
require_once 'Image.php';
require_once 'Str.php';

class Validator{
    public $errors = [];
    public $errors_of_onefield = [];
    public function makeValidation(ValidationInterface $validationObject){
        return $validationObject->validate();
    }
    public function rules($name,$value,array $rules){
        foreach($rules as $rule){
            if($rule == 'required'){
                $error = $this->makeValidation(new Required($name,$value));
            }
            elseif($rule == 'required-image'){
                $error = $this->makeValidation(new RequiredImage($name,$value));
            }
            elseif($rule == 'image'){
                $error = $this->makeValidation(new Image($name,$value));
            }
            elseif($rule == 'string'){
                $error = $this->makeValidation(new Str($name,$value));
            }
            elseif($rule == 'email'){
                $error = $this->makeValidation(new Email($name,$value));
            }
            elseif($rule == 'max:100'){
                $error = $this->makeValidation(new Max($name,$value));
            }
            elseif($rule == 'numeric'){
                $error = $this->makeValidation(new Numeric($name,$value));
            }
            
            if($error != ''){
                // array_push($this->errors,$error);
                array_push($this->errors_of_onefield,$error);
            }
        }
        $this->errors[$name]=$this->errors_of_onefield;
        $this->errors_of_onefield=[];
    }
    
}