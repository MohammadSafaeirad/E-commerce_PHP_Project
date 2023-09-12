<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce index.php
 * 
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad 
 */

session_start();
require_once 'classes/Product.php';
require_once 'classes/helpers/Str.php';
use helpers\Str;

$prod = new Product();
$products = $prod->getAllProducts();
?>
<?php include 'inc/header.php'?>
<?php include 'inc/banner.php'?>



<?php include 'inc/footer.php'?>