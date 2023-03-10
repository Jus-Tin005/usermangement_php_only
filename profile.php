<?php
    include("inc/header.php");
    Session::CheckSession();
?>

<div class="card">
    <div class="card-header">
        <h3>User Profile <span class="float-right"><a href="index.php" class="btn btn-primary">Back</a></span></h3>
    </div>
    <div class="card-body">
        <div style="width:600px;margin:0px auto;">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" id="mobile" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="sel_1">Select User Role</label>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">User Only</option>

                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">User Only</option>

                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">User Only</option>
                    </select>
                </div>

                <input type="hidden" name="role_id" value="">

                <div class="btn-group">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                    <a href="changePass.php" class="btn btn-primary">Password change</a>
                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                </div>
                <div class="form-group">
                    <a href="index.php">Ok</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include("inc/footer.php");
?>