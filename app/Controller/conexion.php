<?php

$Server = "localhost";
$Db="gestionUsuarios";
$User ="root";
$Pass="";

$Conn =  mysqli_connect($Server, $User, $Pass,$Db);

if($Conn->connect_error){
    die("Conexión fallida: ".$Conn->connect_error);
}
?>