<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Session.php";
Session::init();



spl_autoload_register(function($classes){
  include ('classes/'. $classes . ".php");
});

$users = new Users();
$db = new Database();
$role = new Roles();
$perm = new Permissions();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>User Management Application</title>
    <!----------------  
      * Bootstrap CSS*
    ------------------>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!----------------  
      * Font Awesome*
    ------------------>
    <link href="assets/css/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">

     <!----------------  
      * Data Tables  CSS *
    ------------------>
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">

    
    <!----------------  
      * Select-2  CSS *
    ------------------>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/select2-bootstrap-5-theme.min.css">

     <!----------------  
      * Custom CSS *
    ------------------>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>


<?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    Session::destroy();
}
 ?>


    <div class="container p-3">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark  card-header">
        <a class="navbar-brand ps-2" href="index.php"><i class="fas fa-home me-2"></i>Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Mynav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="Mynav">
          <ul class="navbar-nav">
            <?php if (Session::get('id') == TRUE) { ?>
              <?php if (Session::get('roleid') == '1') { ?>
                  <li class="nav-item">
                      <a class="nav-link" href="index.php"><i class="fas fa-users me-2"></i>User Lists</span></a>
                  </li> 
                  <li class="nav-item">
                      <a class="nav-link" href="role.php"><i class="fas fa-tasks me-2"></i>Manage Roles</span></a>
                  </li> 
                  <li class="nav-item <?php $path = $_SERVER['SCRIPT_FILENAME']; $current = basename($path, '.php'); if ($current == 'addUser') { echo " active "; } ?>">
                    <a class="nav-link" href="addUser.php"><i class="fas fa-user-plus me-2"></i>Add User</span></a>
                  </li>
            <?php  } ?>
                <li class="nav-item <?php $path = $_SERVER['SCRIPT_FILENAME']; $current = basename($path, '.php'); if ($current == 'profile') { echo " active "; } ?>">
                  <a class="nav-link" href="profile.php?id=<?php echo Session::get("id"); ?>"><i class="fab fa-500px me-2"></i>Profile <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                </li>
            <?php }else{ ?>
                <li class="nav-item <?php $path = $_SERVER['SCRIPT_FILENAME']; $current = basename($path, '.php'); if ($current == 'register') { echo " active "; } ?>">
                  <a class="nav-link" href="register.php"><i class="fas fa-user-plus me-2"></i>Register</a>
                </li>
                <li class="nav-item <?php $path = $_SERVER['SCRIPT_FILENAME']; $current = basename($path, '.php'); if ($current == 'login') { echo " active "; } ?>">
                  <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
