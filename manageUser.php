<?php
include_once 'inc/header.php';
include_once 'classes/Role.php';


$newRoles = new Role();
    
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addRole'])) {
        $roleAdd = $newRoles->addNewRole($_POST);
    }

    if (isset($roleAdd)) {
    echo $roleAdd;
    }
?>


 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>Add New Role</h3>
        </div>
        <div class="cad-body">
            <div style="width:600px; margin:0px auto">
            <form class="" action="" method="post">
                <div class="form-group">
                    <label for="sel1">Add Role</label>
                    <input type="text" name="role_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sel1">Add Value</label>
                    <input type="text" name="value" class="form-control" required>
                </div>
                <div class="btn-group py-2">
                    <button type="submit" name="addRole" class="btn btn-success">Add</button>
                </div>
            </form>
          </div>
        </div>
      </div>
<?php

 ?>

  <?php
  include 'inc/footer.php';
  ?>
