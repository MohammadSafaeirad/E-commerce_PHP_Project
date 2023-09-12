<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce handleLogout.php
 * 
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad 
 */

session_start();
if(!isset($_SESSION['admin'])){
    header('Location:../login.php');
    die();
}
unset($_SESSION['admin']);
header('Location:../login.php');