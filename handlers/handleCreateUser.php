<?php
declare(strict_types=1);

/*
 * online-shop-PHP- handleCreateUser.php
 *
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad
 */


session_start();
require_once '../classes/admin.php';
require_once '../classes/validations/Validator.php';

use validations\Validator;

//1- if form is submitted
if (isset($_POST['submit'])) {
    //2-read data from the request
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    //3-validation
    $authValidator = new Validator();
    $authValidator->rules('email', $email, ['required', 'email']);
    $authValidator->rules('password', $password, ['required']);
    //errors
    $errors = $authValidator->errors;
    $email_error = count($authValidator->errors['email']);
    $password_error = count($authValidator->errors['password']);
    $is_valid = (!$email_error && !$password_error);
    
    //4-if data are valid
    if ($is_valid) {
        //5-create the new user
        $admin = new Admin();
        $result = $admin->create($username, $email, sha1($password));
        
        //6-if user is created succssfully
        if ($result) {
            header('Location:../login.php');
        } else {
            $_SESSION["errors"] = ["db_error" => ["Unable to create user, please try again."]];
            $_SESSION["formdata"] = $email;
            header('Location:../register.php');
        }
    } else {
        $_SESSION["errors"] = $errors;
        $_SESSION["formdata"] = $email;
        header('Location:../register.php');
    }
} else {
    header('Location:../register.php');
}