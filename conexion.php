<?php

$servidor="localhost";
$db="crud_php";
$user_name="root";
$password="";

try {
    $conexion= new PDO("mysql:host=$servidor; dbname=$db", $user_name, $password );
   // echo "conexion exitosa";

} catch (Exception $e) {
    echo "$e->get Message";
}


?>