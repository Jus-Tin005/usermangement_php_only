<?php
include("lib/Database.php");
include_once("lib/Session.php");

class Users{
    # DB
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    # Date Format 
    public function formatDate($date){
        $strtime = strtotime($date);
        return date('Y-m-d H:i:s', $strtime);
    }

    # Check Exist Email 
    public function checkExistEmail($email){
        $sql = "SELECT email FROM tbl_users WHERE email = :email";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    # User Registration
    public function userRegistration($data){
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $mobile = $data['mobile'];
        $role_id = $data['role_id'];
       

        $checkEmail = $this->checkExistEmail($email);

        if($name == "" || $username == "" || $email == "" || $password == "" || $mobile == "" ){
            $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Please, User Registration field must not be empty !
                </div>
            ';
            return $msg;
        }elseif(strlen($username) < 3){
            $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Username is too short, at least 3 Characters !
                </div>
            ';
            return $msg;
        }elseif(filter_var($mobile,FILTER_SANITIZE_NUMBER_INT) == FALSE){
            $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Enter only Number Characters for Mobile number field !
                </div>
            ';
            return $msg;
        }elseif(strlen($password) < 5){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Password at least 6 Characters !
            </div>
            ';
            return $msg;
        }elseif(!preg_match("#[0-9]+#",$password)){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Your Password Must Contain At Least 1 Number !
            </div>
            ';
            return $msg;
        }elseif(!preg_match("#[a-z]+#",$password)){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Your Password Must Contain At Least 1 Number !
            </div>
            ';
            return $msg;
        }elseif(filter_var($email, FILTER_VALIDATE_EMAIL === FALSE)){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Invalidate E-mail Address !
            </div>
            ';
            return $msg;
        }elseif($checkEmail == TRUE){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                E-mail already Exists, please try another E-mail... !
            </div>
            ';
            return $msg;
        }else{
            $sql = "INSERT INTO tbl_users(name,username,email,password,mobile,role_id) VALUES(:name,:username,:email,:password,:mobile,:role_id)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':name',$name);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', SHA1($password));
            $stmt->bindValue(':mobile', $mobile);   
            $stmt->bindValue(':role_id', $role_id);
            $result = $stmt->execute();

            if($result){
                $msg = '
                <div class="alert alert-success alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Wow, you have Registered Successfully !
                </div>
            ';
            return $msg;
            }else{
                $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Something went wrong !
                </div>
            ';
            return $msg;
            }
        }
    }


    # Add User By Admin
    public function addNewUserByAdmin($data){
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $mobile = $data['mobile'];
        $role_id = $data['role_id'];

        $checkEmail = $this->checkExistEmail($email);


        if($name == "" || $username == "" || $email == "" || $password == "" || $mobile == "" ){
            $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Please, Input fields must not be empty !
                </div>
            ';
            return $msg;
        }elseif(strlen($username) < 3){
            $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Username is too short, at least 3 Characters !
                </div>
            ';
            return $msg;
        }elseif(filter_var($mobile,FILTER_SANITIZE_NUMBER_INT) == FALSE){
            $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Enter only Number Characters for Mobile number field !
                </div>
            ';
            return $msg;
        }elseif(strlen($password) < 5){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Password at least 6 Characters !
            </div>
            ';
            return $msg;
        }elseif(!preg_match("#[0-9]+#",$password)){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Your Password Must Contain At Least 1 Number !
            </div>
            ';
            return $msg;
        }elseif(!preg_match("#[a-z]+#",$password)){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Your Password Must Contain At Least 1 Number !
            </div>
            ';
            return $msg;
        }elseif(filter_var($email, FILTER_VALIDATE_EMAIL === FALSE)){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Invalidate E-mail Address !
            </div>
            ';
            return $msg;
        }elseif($checkEmail == TRUE){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                E-mail already Exists, please try another E-mail... !
            </div>
            ';
            return $msg;
        }else{
            $sql = "INSERT INTO tbl_users(name,username,email,password,mobile,role_id) VALUES(:name,:username,:email,:password,:mobile,:role_id)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':name',$name);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', SHA1($password));
            $stmt->bindValue(':mobile', $mobile);   
            $stmt->bindValue(':role_id', $role_id);
            $result = $stmt->execute();

            if($result){
                $msg = '
                <div class="alert alert-success alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Wow, you have Registered Successfully !
                </div>
            ';
            return $msg;
            }else{
                $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Something went wrong !
                </div>
            ';
            return $msg;
            }
        }
    }


    # Select All Users
    public function selectAllUsersData(){
        $sql = "SELECT * FROM tbl_users ORDER BY id DESC";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    # User Login Authorization
    public function userLoginAuthorization($email,$password){
        $password = SHA1($password);
        $sql = "SELECT * FROM tbl_users WHERE email = :email and password = :password LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    # Check User Account Status
    public function checkActiveUser($email){
        $sql = "SELECT * FROM tbl_users WHERE email = :email and isActive = :isActive LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':isActive',1);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    # User Login Authentication
    public function userLoginAuthentication($data){
        $email = $data['email'];
        $password = $data['password'];

        $checkEmail = $this->checkExistEmail($email);

        if($email == "" || $password == ""){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                E-mail or Password not be empty !
            </div>
            ';
            return $msg;
        }elseif(filter_var($email, FILTER_VALIDATE_EMAIL === FALSE)){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Invalid E-mail Address !
            </div>
            ';
            return $msg;
        }elseif($checkEmail == FALSE){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                E-mail did not found, use Register email or password please !
            </div>
            ';
            return $msg;
        }else{
            $logResult = $this->userLoginAuthorization($email,$password);
            $checkActive = $this->checkActiveUser($email);

            if( $checkActive == TRUE){
                $msg = '
                    <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                        <a href="#" class="close" data-dismiss="alert">$times;</a>
                        <strong>Error !</strong>
                        Sorry, Your account is Diactivated, Contact with Admin !
                    </div>
                    ';
                    return $msg;
            }elseif($logResult){
                    Session::init();
                    Session::set('login', TRUE);
                    Session::set('id',$logResult->id);
                    Session::set('role_id',$logResult->role_id);
                    Session::set('name',$logResult->name);
                    Session::set('username',$logResult->username);
                    Session::set('logMsg', '
                                        <div class="alert alert-success alert-dismissible fade show mt-3" id="flash-msg">
                                            <a href="#" class="close" data-dismiss="alert">$times;</a>
                                            <strong>Success !</strong>
                                            You Are Logged In Successfully !
                                        </div>
                    ');
                  echo "<script>location.href='index.php';</script>";
            }else{
                $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    E-mail or Password did not matched !
                </div>
                ';
                return $msg;
            }
        }
    }

    # Get Single User Information By ID
    public function getUserInfoById($user_id){
        $sql = "SELECT * FROM tbl_users WHERE id = :id LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':id',$user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if($result){
            return $result;
        }else{
            return false;
        }
    }

    #Update User Information By ID

    public function updateUserInfoById($user_id,$data){
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $role_id = $data['role_id'];

        if($name == "" || $username == "" || $email == ""){
            $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Input Fields must not be Empty !
                </div>
                ';
                return $msg;
        }elseif(strlen($username) < 3){
            $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Username is too short, at least 3 Characters !
                </div>
                ';
                return $msg;
        }elseif(filter_var($mobile, FILTER_SANITIZE_NUMBER_INT) === FALSE){
            $msg = '
                <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                    <a href="#" class="close" data-dismiss="alert">$times;</a>
                    <strong>Error !</strong>
                    Enter only Number Characters for Mobile number field !
                </div>
                ';
                return $msg;
        }elseif(filter_var($email, FILTER_VALIDATE_EMAIL === FALSE)){
            $msg = '
            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert">$times;</a>
                <strong>Error !</strong>
                Invalid E-mail Address !
            </div>
            ';
            return $msg;
        }else{
            $sql = "UPDATE tbl_users SET 
                name = :name,
                username = :username,
                email = :email,
                mobile = :mobile,
                role_id = :role_id,
               WHERE id = :id";

               $stmt = $this->db->pdo->prepare($sql);
               $stmt->bindValue(':name',$name);
               $stmt->bindValue(':username',$username);
               $stmt->bindValue(':email',$email);
               $stmt->bindValue(':mobile',$mobile);
               $stmt->bindValue(':role_id',$role_id);
               $stmt->bindValue(':id',$user_id);
               $result = $stmt->execute();

               if($result){
                echo "<script>location.href='index.php';</script>";
                Session::set('msg','
                            <div class="alert alert-success alert-dismissible fade show mt-3" id="flash-msg">
                                <a href="#" class="close" data-dismiss="alert">$times;</a>
                                <strong>Success !</strong>
                                Wow, Your information updated Successfully !
                            </div>
                ');
               }else{
                echo "<script>location.href='index.php';</script>";
                Session::set('msg','
                            <div class="alert alert-danger alert-dismissible fade show mt-3" id="flash-msg">
                                <a href="#" class="close" data-dismiss="alert">$times;</a>
                                <strong>Error !</strong>
                                Data is not inserted !
                            </div>
                ');
               }
        }
    }


    # Delete User By ID
}





