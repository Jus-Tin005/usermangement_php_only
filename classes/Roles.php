<?php
include_once 'lib/Database.php';




class Roles {
    private $db;

    # Construct Auto Load
    public function __construct(){
        $this->db = new Database();
    }




    # Add New Role
    public function addNewRole($data){
        $role_name = $data['role_name'];
        $roled_name = $data['roled_name'];


        if($role_name  == '' || $roled_name == ''){
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error ! </strong>Role Name and Display Name field must not be Empty!
                    </div>';
        return $msg;
        }else{  

            $sql = "INSERT INTO tbl_roles(role_name,roled_name)VALUES(:role_name,:roled_name)";       
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':role_name',$role_name);
            $stmt->bindValue(':roled_name',$roled_name);
            $result = $stmt->execute();
            
            if($result){
                $msg = '<div class="alert alert-success alert-dismissible" id="flash-msg">
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				            <strong>Success! </strong> New user Role added Successfully !
                        </div>';
				return  $msg;
            }else{
                $msg = '<div class="alert alert-danger alert-dismissible" id="flash-msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error ! </strong>Something went wrong , Data is not inserted.
                        </div>';
                return $msg;
            }
        }
    }

    


    # Select Role
    public function selectRole(){
        $sql = "SELECT * FROM tbl_roles ORDER BY roled_name";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;   
    }

    # Edit Role By ID
    public function editRole($role_id){
        $sql = "SELECT * FROM tbl_roles WHERE role_id = $role_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }

    # Update Role By ID
    public function updateRole($data,$role_id){
        $role_id = preg_replace('/[^a-zA-Z0-9-]/', '',$role_id);
        $roled_name = $data['roled_name'];

        if(empty($roled_name)){
            $msg = '<div class="alert alert-danger alert-dismissible" id="flash-msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error ! </strong> Display Name field must not be Empty!
                        </div>';
            return $msg;
        }else{
            $sql = "UPDATE tbl_roles SET roled_name = :roled_name WHERE role_id = :role_id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':roled_name',$roled_name);
            $stmt->bindValue(':role_id',$role_id);
            $result = $stmt->execute();

            if($result){
                $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success !</strong> User Role Updated Successfully !
                        </div>';
                return $msg;
            }else{
                $msg = '<div class="alert alert-danger alert-dismissible" id="flash-msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error ! </strong> Something went wrong , Data is not updated !
                        </div>';
                return $msg;
            }

        }
    }

    # Delete Role By ID
    public function deleteRole($role_id){
        $role_id = preg_replace('/[^a-zA-Z0-9-]/', '',$role_id);
        $sql = "DELETE FROM tbl_roles WHERE role_id = :role_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':role_id',$role_id);
        $result = $stmt->execute();
        if($result){
            $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success !</strong> User Role Deleted Successfully !
                    </div>';
            return $msg;
        }else{
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error !</strong> Data is not Deleted !
                  </div>';
          return $msg;
        }
    }
   
}

