<!-- Star Session for Messages -->
<?php session_start(); ?>
<?php
    if($_SESSION['logged']){
        //Redirect to login page
        header("location:dashboard.php");
    }else{
        //Create a danger message for the not created user 
        $_SESSION['message'] = array('text'=>'First Login','status'=> 'danger');
        //Redirect to login page
        header("location:login.php");
    }
?>