<?php
    session_start();
    include 'dbcon.php';
    if(isset($_GET['token_admin'])){
        $token = $_GET['token_admin'];
        $updatequery = "update register_admin set status_admin = 'active' where token_admin = '$token' ";
        $query = mysqli_query($con, $updatequery);
        if($query){
            if(isset($_SESSION['msg'])){
                $_SESSION['msg'] = "Account updated successfully";
                header('location: login_admin.php');
            }
            else{
                $_SESSION['msg'] = "You are logged out";
                header('location: logout_admin.php');
            }
        }
        else{
            $_SESSION['msg'] = "Account not updated.";
            header('location: register_admin.php');
        }
    }
    else{
        echo "fail";
    }
?>