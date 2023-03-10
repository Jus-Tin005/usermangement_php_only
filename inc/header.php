<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath . "/../lib/Session.php"); 
    Session::init();

    /*
    spl_autoload_register(function($classes){
        include("classes" . $classes . ".php");
    });

    $users = new Users();
    */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="assets/css/fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    
<div class="container">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
        <a href="index.php" class="navbar-brand"><i class="fas fa-home mr-2"></i>Home</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="myNav" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link"><i class="fas fa-users mr-2"></i>User Lists</a></li>
                <li class="nav-item"><a href="addUser.php" class="nav-link"><i class="fas fa-user mr-2"></i>Add User</a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only"></span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
                <li class="nav-item"><a href="register.php" class="nav-link"><i class="fas fa-user-plus mr-2"></i>Register</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i>Login</a></li>
            </ul>
        </div>
    </nav>
</div>
