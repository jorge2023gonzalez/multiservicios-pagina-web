<?php
$servidor="localhost";
$baseDeDatos="mysql";
$usuario="root";
$contraseña="";

try{

    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contraseña);
    //echo"conexion realizada...";

}catch(Exception $error){
    echo $error->getMessage();

}

?>