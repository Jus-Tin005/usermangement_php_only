<?php
include("inc/header.php");
Session::CheckSession();

$logMsg = Session::get('logMsg');
if(isset($logMsg)){
    echo $logMsg;
}

$msg = Session::get('msg');
if(isset($msg)){
    echo $msg;
}

Session::set('msg',NULL);
Session::set('logMsg',NULL);
?>

<?php
if(isset($_GET['remove'])){
    $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
    $removeUser = $users->deleteUserById($remove);
}
if(isset($removeUser)){
    echo $removeUser;
}
if(isset($_GET['deactive'])){
    $deactive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['deactive']);
    $deactiveId = $users->userDeactiveByAdmin($deactive);
}
if(isset($deactiveId)) {
    echo $deactiveId;
}
if(isset($_GET['active'])){
    $active = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['active']);
    $activeId = $users->userActiveByAdmin($active);
}
if(isset($activeId)){
    echo $activeId;
}
?>

<div class="card">
    <div class="card-header">
        <h3>
            <i class="fas fa-users mr-2"></i>User Lists 
            <span class="float-right">
                <strong>Welcome !
                    <span class="badge badge-lg badge-secondary text-white">
                        <?php $username = Session::get('username'); if(isset($username)){ echo $username; } ?>
                    </span>
                </strong>
            </span>
        </h3>
    </div>
    <div class="card-body pr-2 pl-2">
        <table id="myTable" class="table table-striped table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <center>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email Address</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th style="width:25%;">Action</th>
                    </center>
                </tr>
            </thead>
            <tbody>
                <?php $allUser = $users->selectAllUsersData(); if($allUser){ $i = 0; foreach($allUser as $value){ $i++; } } ?>
                <tr class="text-center">
                    <?php if(Session::get('id') == $value->id){ echo "style='background:#d9edf7;' "; } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>