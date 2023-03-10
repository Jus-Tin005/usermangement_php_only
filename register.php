<?php
    include("inc/header.php");
    Session::CheckLogin();
?>


<div class="card">
    <div class="card-header">
        <h3 class="text-center"><i class="fas fa-sign-alt mr-2"></i>User Registration</h3>
    </div>
    <div class="card-body">
        <div style="width:600px; margin:0 auto;">
            <form action="" method="post">
                <div class="form-group pt-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit"name="register" class="btn btn-success">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
    include("inc/footer.php");
?>

