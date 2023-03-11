<?php
include("inc/header.php");
Session::CheckSession();
$sessId = Session::get('role_id');

if($sessId === '1'){    ?>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])){
            $userAdd = $users->addNewUserByAdmin($_POST);
        }

        if(isset($userAdd)){
            echo $userAdd;
        }
    ?>

<div class="card">
    <div class="card-header">
        <h3 class="text-center">Add New User</h3>
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
                    <label for="sel_1">Select User Role</label>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">User Only</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit"name="addUser" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php }else{  header('Location:index.php'); } ?>
<?php
    include('inc/footer.php');
?>

