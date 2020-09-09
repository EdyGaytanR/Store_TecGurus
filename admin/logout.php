<!-- Star Session for Messages -->
<?php session_start(); ?>
<?php
unset($_SESSION['logged']);
$_SESSION['message'] = array('text'=>'Success LogOut','status'=> 'success');
header("location:login.php");
?>