<?php

$Server = "localhost";
$Db="gestionUsuarios";
$User ="root";
$Pass="";

$Conn= new mysqli($Server, $User, $Pass,$Db);

if($Conn->connect_error){
    die("Conexión fallida: ".$Conn->connect_error);
}
echo "Conexión exitosa";
?>