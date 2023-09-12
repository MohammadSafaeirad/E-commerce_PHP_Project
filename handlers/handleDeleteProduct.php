<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce handleDeleteProduct.php
 * 
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad 
 */

session_start();
require_once '../classes/Product.php';
if(!isset($_SESSION['admin'])){
    header('Location:../login.php');
    die();
}

$id = $_GET['id'];
$prod = new Product;
//delete the product from db and the image file from images folder
$product = $prod->getProductById($id);
$img = $product['img'];
$imgpath = '../images/'.$img;
$result = $prod->deleteProduct($id);
if($result){
    unlink( $imgpath );
    header("Location:../index.php");
}