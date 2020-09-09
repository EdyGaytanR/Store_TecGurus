<?php
//Start Session Var for Messages
session_start();
//Include conection file to DB
include 'conection.php';

//Recive POST var from Form
$name = $_POST['name'];

//Validate if the 3 vars are full
if (isset($name)) {
    //Create query for INSERT vars into user table 
    $query = "Insert into categories(name,status) values('{$name}','1')";
    //Run Query and validate return bool
    if (mysqli_query($conection,$query)) {
        //Create a success message for the created user 
        $_SESSION['message'] = array('text'=>'New Category Created','status'=> 'success');
        //Redirect to login page
        header("location:categories.php");
      } else {
        //Create a danger message for the not created user 
        $_SESSION['message'] = array('text'=>mysqli_error($conection),'status'=> 'danger');
        //Redirect to login page
        header("location:categories.php");
        echo "Error: " . $query . "<br>" . mysqli_error($conection);
      }
}

?>