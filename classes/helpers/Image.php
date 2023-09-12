<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce Image.php
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
class Image {
    public $name;
    public $tmp_name;
    public $extension;
    public $new_name;
    
    public function __construct($img){
        $this->name = $img['name'];
        $this->tmp_name = $img['tmp_name'];
        $this->extension = pathinfo($this->name)['extension'];
        $this->new_name = uniqid() . '.' . $this->extension;
    }
    public function upload(){
        move_uploaded_file($this->tmp_name,'../images/' . $this->new_name);
    }
}