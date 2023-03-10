<?php
include("inc/header.php");
Session::CheckSession();
?>

<div class="card">
    <div class="card-header">
        <h3>
            <i class="fas fa-users mr-2"></i>User Lists 
            <span class="float-right">
                <strong>Welcome !
                    <span class="badge badge-lg badge-secondary text-white"></span>
                </strong>
            </span>
        </h3>
    </div>
    <div class="card-body pr-2 pl-2">
        <table id="" class="table table-striped table-bordered" style="width:100%;">
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
                <tr class="text-center">

                </tr>
            </tbody>
        </table>
    </div>
</div>