<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce handleDeleteCategory.php
 * 
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad 
 */

session_start();
require_once '../classes/Category.php';
if(!isset($_SESSION['admin'])){
    header('Location:../login.php');
    die();
}

$id = $_GET['id'];
$cat = new Category;
$result = $cat->deleteCategory($id);
if($result){
    header("Location:../addCategory.php");
}
