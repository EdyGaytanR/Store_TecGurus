<?php
include 'conection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
if (isset($name) && isset($email) && isset($password)) {
    $password = md5($password);
    $query = "INSERT into users(name,email,password) values('{$name}','{$email}','{$password}')";
    if (mysqli_query($conection,$query)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}

?>