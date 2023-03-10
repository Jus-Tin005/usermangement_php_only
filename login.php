<?php
    include("inc/header.php");
    Session::CheckLogin();
?>


<div class="card">
    <div class="card-header">
        <h3 class="text-center"><i class="fas fa-sign-alt mr-2"></i>User Login</h3>
    </div>
    <div class="card-body">
        <div style="width:450px; margin:0 auto;">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit"name="login" class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
    include("inc/footer.php");
?>