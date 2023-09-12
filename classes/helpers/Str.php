<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce Str.php
 * 
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad 
 */

/**
 * @TODO   Documentation
 *
 * @author Mohammad Safaeirad
 * @since  4/20/2023
 */
namespace helpers;
class Str {
    
    public static function limit(string $str) {
        if(strlen($str) > 80){
            $str = substr($str,0,80) . ' ...';
            return $str;
        }
        return $str;
    }
    
}