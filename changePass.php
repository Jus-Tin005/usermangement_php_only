<?php
    include("inc/header.php");
    Session::CheckSession();
?>

<div class="card">
    <div class="card-header">
        <h3>Change your password
            <span class="float-right">
                <a href="profile.php" class="btn btn-primary">Back</a>
            </span>
        </h3>
    </div>
    <div class="card-body">
        <div style="width:600px; margin:0 auto;">
            <form action="" method="post">
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                <div class="form">
                    <button type="submit" name="changePass" class="btn btn-success">Change password</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    include("inc/footer.php");
?>