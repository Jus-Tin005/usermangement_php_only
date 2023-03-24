<?php
include_once 'lib/Database.php';

class Permissions{
    private $db;

    # Construct Auto Load
    public function __construct(){
        $this->db = new Database();
    }

    # Select Permission
    public function selectAllPermission(){
        $sql = "SELECT y.permission_items FROM  tbl_roles AS x JOIN tbl_permissions AS y
                WHERE x.role_id = y.per_id  ORDER BY y.per_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    # Add Permission
    public function addPermission($data){
        $permission = array();
        $permission = $data['permission_items'];

        foreach($permission as $value){
            if(is_array($value)){
                foreach($value as $val){
                    $arr[] = $val;
                }
            }else{
                $arr[] = $value;
            }
        }
        $run = implode(",", $arr);

        $sql = "INSERT INTO tbl_permissions(permission_items)VALUES(:permission_items)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':permission_items', $run);
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