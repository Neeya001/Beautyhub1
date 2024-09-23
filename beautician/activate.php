<?php
    session_start();
    include 'dbcon.php';
    if(isset($_GET['token_beautician'])){
        $token = $_GET['token_beautician'];
        $updatequery = "update register_beautician set status_beautician = 'active' where token_beautician = '$token' ";
        $query = mysqli_query($con, $updatequery);
        if($query){
            if(isset($_SESSION['msg'])){
                $_SESSION['msg'] = "Account updated successfully";
                header('location: login_beautician.php');
            }
            else{
                $_SESSION['msg'] = "You are logged out";
                header('location: login_beautician.php');
            }
        }
        else{
            $_SESSION['msg'] = "Account not updated.";
            header('location: register_beautician.php');
        }
    }
    else{
        echo "fail";
    }
?>