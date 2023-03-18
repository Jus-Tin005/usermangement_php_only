<?php
include_once 'lib/Database.php';

class Role{
    private $db;
    public function __construct(){
      $this->db = new Database();
    }


    # Select All Roles
    public function fetchRole(){
        $sql = "SELECT tbl_roles.role_name AS role,tbl_roles.value FROM tbl_roles RIGHT JOIN tbl_users ON tbl_roles.roleid = tbl_users.roleid  LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    # Add New Role
    public function addNewRole($data){
        $role_name = $data['role_name'];
        $value = $data['value'];
      
    
        if ($role_name == "" ||  $value == '') {
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error !</strong> Input fields must not be Empty !
                  </div>';
          return $msg;
        }elseif (strlen($role_name) < 3) {
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error !</strong> Role name is too short, at least 3 Characters !
                  </div>';
          return $msg;
        }elseif (filter_var($value,FILTER_SANITIZE_NUMBER_INT) == FALSE) {
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error !</strong> Enter only Number Characters for Mobile number field !
                  </div>';
          return $msg;
        }else{
    
          $sql = "INSERT INTO tbl_roles(role_name,value) VALUES(:role_name,:value)";



          $stmt = $this->db->pdo->prepare($sql);
          $stmt->bindValue(':role_name', $role_name);
          $stmt->bindValue(':value', $value);
          $result = $stmt->execute();
          if ($result) {
            $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success !</strong> Wow, you have Registered Successfully !
                    </div>';
            return $msg;
          }else{
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> Something went Wrong !
                    </div>';
            return $msg;
          }

        }
      }
}

