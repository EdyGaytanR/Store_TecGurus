<?php
//Start Session Var for Messages
session_start();
//Include conection file to DB
include 'conection.php';

if(isset($_FILES['image'])){
    //Folder to upload the image
    $folderUpload = "../imgs/products/";
    //File`s Name
    $nameFile = rand().$_FILES['image']['name'];
    //File`s Temp Name
    $filename = $_FILES['image']['tmp_name'];
    //Destination
    $destination = $folderUpload.$nameFile;
    move_uploaded_file($filename, $destination);
}

//Recive POST var from Form
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];

//Validate if the 3 vars are full
if (isset($name)) {
    //Create query for INSERT vars into user table 
    $query = "Insert into products(name,description,price,id_category,image,status) values('{$name}','{$description}','{$price}','{$category}','{$nameFile}','1')";
    //Run Query and validate return bool
    if (mysqli_query($conection,$query)) {
        //Create a success message for the created user 
        $_SESSION['message'] = array('text'=>'New Product Created','status'=> 'success');
        //Redirect to login page
        header("location:products.php");
      } else {
        //Create a danger message for the not created user 
        $_SESSION['message'] = array('text'=>mysqli_error($conection),'status'=> 'danger');
        //Redirect to login page
        header("location:products.php");
        echo "Error: " . $query . "<br>" . mysqli_error($conection);
      }
}

?>