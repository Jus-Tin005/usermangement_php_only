<?php include_once 'inc/header.php'; ?>


<?php
 $role_id = isset($_GET['role_id']) ? $_GET['role_id'] : '';
 if(!isset($role_id) && $role_id == NULL){
   echo "<script>location.href='role.php';</script>";
   exit();
 }else{
   $getRole = $role->editRole();
 }
?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
   $updateRole = $role->updateRole($_POST,$role_id);
}
?>



<section  id="wrapper">
   <div class="page-content-wrapper">
         <div class="content-header">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
                  <li class="breadcrumb-item"><a href="role.php">Role</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
               </ol>
            </nav>
         </div>
         
         <?php if(isset($updateRole)){ echo  $updateRole; }    ?>

         <div class="main-content">
            <div class="card bg-white">
               <div class="card-body mt-5 mb-5">
                  <div class="viewuser">
                     <?php  if($getRole){ foreach($getRole as $key => $val){   ?>
                           <form action="" method="POST">
                              <div class="form-group row">
                                 <div class="col-md-2">Role Name</div>
                                 <div class="col-md-8 py-1">
                                    <input type="text"  id="role_name"  class="form-control"  value="<?= $val->role_name; ?>" readonly="readonly" autofocus=""> 
                                 </div>
                              </div> 
                              <div class="form-group row">
                                 <div class="col-md-2 py-1">Display Name</div>
                                 <div class="col-md-8">
                                    <input type="text" name="roled_name" id="roled_name"  class="form-control"  value="<?= $val->roled_name ?>" autofocus="">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-2">Permissions Edit</div>
                                 <div class="col-md-8 py-1">
                                    <div class="form-group">    
                                          <select name="permission_items[]"  id="multiple-select-field"  class="form-control multiple-select-field"  multiple="multiple" required="readonly">
                                             <optgroup>
                                             <?php
                                                   $permissionList = $perm->selectAllPermission(); 
                                                   $convert =  json_decode(json_encode($permissionList), true);;
                                                  
                                    
                                                   if($convert){ foreach($convert as $allow){ 
                                                      $list = explode(',', $val->permission_items);
                                                      foreach($list as $item){
                                                         $item;
                                                         echo '<option value=" ' . $item .' " '; 
                                                         if(in_array($item,$allow)){
                                                            echo 'selected';
                                                            echo '>' . $item . '</option> ';
                                                         } 
                                                      } 
                                                   }
                                                  }
                                              ?>
                                             </optgroup>
                                          </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group pt-2 row">
                                 <div class="col-md-2"></div>
                                 <div class="col-md-4">
                                    <button class="btn btn-success" type="submit" name="update">Update</button>
                                    <button class="btn btn-warning text-white" type="reset">Reset</button>
                                 </div>
                              </div>
                           </form>
                        <?php  } }else{
                           echo "<script>window.location='role.php';</script>";
                        } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</section>

<?php include_once 'inc/footer.php'; ?>