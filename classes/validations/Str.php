<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce Str.php
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

class Str implements ValidationInterface{
    private $name;
    private $value;
    public function __construct($name,$value){
        $this->name = $name;
        $this->value = $value;
    }
    public function validate(){
        if(is_numeric($this->value)){
            return "$this->name must be string";
        }
        return '';
    }
}