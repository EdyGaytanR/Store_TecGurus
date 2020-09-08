<?php
	// Datos de la base de datos
	$user = "root";
	$password = "root";
	$server = "localhost";
    $database = "store_tecgurus";

    //Creando la conexion a las DBs con mysqli_connect()
    //mysqli_connect('localhost','root','root')
    $conection =mysqli_connect($server,$user,$password) 
    or die('Cant Connect to DB');
    
    //Seleccionar la DB a utilizar
    $store_db = mysqli_select_db($conection,$database)
    or die('Cant Select DB');
?>