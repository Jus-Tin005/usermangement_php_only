<?php 
include_once 'inc/header.php';
 ?>


<?php 
   global $access;
   global $edit;

   
   $delete_role = isset($_GET['delete_role']) ? $_GET['delete_role'] : '';
   if(isset($delete_role) && is_numeric($delete_role) && isset($_GET['remove']) == 'remove_id'){
      $delete_role = preg_replace('/[^a-zA-Z0-9-]/','',$delete_role);
      $delete_role = $role->deleteRole($delete_role);
   }
 ?>

<section id="wrapper">
   <div class="page-content-wrapper">
      <div class="content-header">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item active"><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Roles</li>
            </ol>
         </nav>
         <div class="create-item">
            <a href="create-role.php" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add New Role</a>
         </div>
      </div>
     

      <?php if(isset($delete_role)){ echo $delete_role; } ?>

      <div class="main-content">
         <div class="row mt-3">
            <div class="col-md-12">
               <div class="card bg-white">
                  <div class="card-body mt-3">
                     <div class="table-responsive">
                        <table id="roleTable" class="table table-striped table-borderless" style="width:100%">
                           <thead>
                              <tr>
                                 <th>SL</th>
                                 <th>Display Name</th>
                                 <th>Role Name</th>
                                 <th>Status</th>
                                 <th class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php 
                                 $roleList = $role->selectRole();  
                                 if($roleList){
                                    $i = 0;
                                    foreach($roleList as $result){ $i++; 
                                     
                           ?>
                              <tr>
                                 <td class="pt-3"><?= $i; ?></td>
                                 <td class="pt-3"><?= $result->roled_name; ?></td>
                                 <td class="pt-3">
                                    <span class="badge  bg-secondary text-white"><?= $result->role_name; ?></span>
                                 </td>
                                 <td class="pt-3">
                                    <?php if($result->status == '0'){ ?>
                                       <span class="badge  bg-success text-white">Active</span>
                                    <?php }elseif($result->status == '1'){ ?>
                                       <span class="badge  bg-warning text-white">Deactive</span>
                                    <?php } ?>
                                 </td>
                                 <td class="text-center pt-3">
                                       <a class="btn btn-info" href="edit-role.php?role_id=<?php echo $result->role_id; ?>">Edit</a>
                                    <?php if($result->role_name == 'Author'){ ?>
                                          <?php if(isset($access) == "$access"){ ?>
                                             <a class="btn btn-danger" href="#" onclick="return confirm('You cannot remove acccount');">No Action</a>
                                          <?php } ?>   
                                    <?php }else{ ?>
                                          <?php  if(isset($edit) == "$edit"){ ?>
                                             <a class="btn btn-danger" href="?remove=remove_id && delete_role=<?php echo $result->role_id; ?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                                          <?php } ?>
                                    <?php } ?>
                                    </td>
                              </tr>
                           <?php } }else{?>
                              <tr>
                                 <td colspan="5" class="text-center">No role created yet !</td>
                              </tr>
                              <?php } ?>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>    
   </div>
</section>


<?php   include_once 'inc/footer.php'; ?>
