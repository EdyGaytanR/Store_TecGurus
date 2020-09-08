<?php
//Start Session Var for Messages
session_start();
//Include conection file to DB
include 'conection.php';

//Recive POST var from Form
$email = $_POST['email'];
$password = $_POST['password'];
//Validate if the 2 vars are full
if (isset($email) && isset($password)) {
    //Transform the password into MD5 encrypt
    $password = md5($password);
    //Create query for SELECT into user table 
    $query = "Select * from users where email='{$email}' and password='{$password}'";
    //Run Query and validate return bool
    $result = mysqli_query($conection,$query);
    //Validate 1 row in the result  
    if (mysqli_num_rows($result) == 1) {
        //Create a Var Session for logedd user
        $_SESSION['logged']=true;
        //Redirect to login page
        header("location:dashboard.php");
      } else {
        //Create a danger message for the not created user 
        $_SESSION['message'] = array('text'=>'User and Password Incorrect','status'=> 'danger');
        //Redirect to login page
        header("location:login.php");
        echo "Error: " . $query . "<br>" . mysqli_error($conection);
      }
}

?>