<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce login.php
 * 
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad 
 */

session_start();
if(isset($_SESSION['admin'])){
    header('Location:index.php');
}
?>
<?php include './inc/header.php'?>
    
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <?php if(isset($_SESSION["errors"]["db_error"])){?>
                            <?php foreach($_SESSION["errors"]["db_error"] as $error){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <h3 class="card-title text-center">Login</h3>
                        <form method="post" action="handlers/handleLogin.php">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" value="<?= isset($_SESSION["formdata"])? $_SESSION["formdata"] :""?>" class="form-control" id="email" placeholder="name@example.com" >
                            </div>
                            <?php if(isset($_SESSION["errors"]["email"])){?>
                                <?php foreach($_SESSION["errors"]["email"] as $error){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                            </div>
                            <?php if(isset($_SESSION["errors"]["password"])){?>
                                <?php foreach($_SESSION["errors"]["password"] as $error){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="d-grid">
                                <input type="submit" name="submit" class="btn btn-primary" value="Login">
                            </div>
                            <?php
                            unset($_SESSION["errors"]);
                            unset($_SESSION["formdata"]);
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <?php if(isset($_SESSION["errors"]["create_user"])){?>
                            <?php foreach($_SESSION["errors"]["create_user"] as $error){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <h3 class="card-title text-center">Create User</h3>
                        <form method="post" action="handlers/handleCreateUser.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" name="username" value="<?= isset($_SESSION["formdata"])? $_SESSION["formdata"]['name'] :""?>" class="form-control" id="name" placeholder="Enter username" >
                            </div>
                            <?php if(isset($_SESSION["errors"]["name"])){?>
                                <?php foreach($_SESSION["errors"]["name"] as $error){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" value="<?= isset($_SESSION["formdata"])? $_SESSION["formdata"]['email'] :""?>" class="form-control" id="email" placeholder="Enter email" >
                            </div>
                            <?php if(isset($_SESSION["errors"]["email"])){?>
                                <?php foreach($_SESSION["errors"]["email"] as $error){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                            </div>
                            <?php if(isset($_SESSION["errors"]["password"])){?>
                                <?php foreach($_SESSION["errors"]["password"] as $error){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="d-grid">
                                <input type="submit" name="submit" class="btn btn-primary" value="Create">
                            </div>
                            <?php
                            unset($_SESSION["errors"]);
                            unset($_SESSION["formdata"]);
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
<?php include './inc/footer.php'?>
    <!-- Clear session errors and form data after use -->
<?php
unset($_SESSION["errors"]);
unset($_SESSION["formdata"]);
?>