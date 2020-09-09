<?php
//Start Session Var for Messages
session_start();
//Include conection file to DB
include 'conection.php';

//Recive POST var from Form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

//Validate if the 3 vars are full
if (isset($name) && isset($email) && isset($password)) {
    //Transform the password into MD5 encrypt
    $password = md5($password);
    //Create query for INSERT vars into user table 
    $query = "Insert into users(name,email,password) values('{$name}','{$email}','{$password}')";
    //Run Query and validate return bool
    if (mysqli_query($conection,$query)) {
        //Create a success message for the created user 
        $_SESSION['message'] = array('text'=>'New User Created','status'=> 'success');
        //Redirect to login page
        header("location:users.php");
      } else {
        //Create a danger message for the not created user 
        $_SESSION['message'] = array('text'=>mysqli_error($conection),'status'=> 'danger');
        //Redirect to login page
        header("location:users.php");
        echo "Error: " . $query . "<br>" . mysqli_error($conection);
      }
}

?>