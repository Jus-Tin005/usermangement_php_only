
<?php include_once 'inc/header.php'; ?>



<?php
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_role'])){
      $addRole = $role->addNewRole($_POST);
   }
?>



<section id="wrapper">
   <div class="page-content-wrapper">
      <div class="content-header">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
               <li class="breadcrumb-item"><a href="role.php">Role</a></li>
               <li class="breadcrumb-item active" aria-current="page">Add New Role</li>
            </ol>
         </nav>
         <div class="create-item">
            <a href="create-role.php" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add New Role</a>
         </div>
      </div>

      <?php if(isset($addRole)){ echo $addRole; } ?>

      <div class="main-content">
         <div class="card bg-white">
            <div class="card-body mt-5 mb-5">
               <div class="viewuser">
                  <form action="" method="POST">
                     <div class="form-group row py-1">
                        <div class="col-md-2">Role Name</div>
                        <div class="col-md-8">
                           <input type="text" name="role_name" id="role_name" class="form-control" placeholder="Add new role"   value="" autofocus="">
                        </div>
                     </div>
                     <div class="form-group row  py-1">
                        <div class="col-md-2">Display Name</div>
                        <div class="col-md-8">
                           <input type="text" name="roled_name" id="roled_name" class="form-control"  placeholder="Display Name"   value="" autofocus="">
                        </div>
                     </div>
                     <div class="form-group row  py-1">
                        <div class="col-md-2">Permissions Item</div>
                        <div class="col-md-8">

         
                           <div class="form-group">
                              <div>
                                 <select name="permission_items[]" id="multiple-select-field"  class="form-control multiple-select-field"  multiple="multiple">
                                    <optgroup>
                                       <?php 
                                          $permissionList = $perm->selectAllPermission(); 
                                          var_dump($permissionList);
                                        
                                 
                                          if($permissionList){  foreach($permissionList as $allow){  
                                       ?>
                                          
                                             <option value="<?= $allow->per_access; ?>"><?= $allow->per_access; ?></option>
                                             <option value="<?= $allow->per_create; ?>"><?= $allow->per_create; ?></option>
                                             <option value="<?= $allow->per_show; ?>"><?= $allow->per_show; ?></option>
                                             <option value="<?= $allow->per_edit; ?>"><?= $allow->per_edit; ?></option>
                                             <option value="<?= $allow->per_delete; ?>"><?= $allow->per_delete; ?></option>
                                             <option value="<?= $allow->ban_active_user; ?>"><?= $allow->ban_active_user; ?></option>
                                             <option value="<?= $allow->per_onlyUser; ?>"><?= $allow->per_onlyUser; ?></option>
                                         <?php } } ?>
                                    </optgroup>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="form-group pt-2 row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                           <button type="submit"  name="create_role" class="btn btn-success" >Create</button>
                           <button type="reset" class="btn btn-warning text-white" >Reset</button>
                        </div>
                     </div>

                  </form>

               </div>

            </div>
         </div>
      </div>
   </div>
   </div>
</section>



<?php include_once 'inc/footer.php'; ?>