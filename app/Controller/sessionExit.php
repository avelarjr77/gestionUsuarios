<?php
require_once '../Controller/conexion.php';
session_start();

$usuario_id = $_SESSION['username'];

$query = "UPDATE db_gu_usuarios SET u_sesion = NOW()
          WHERE u_usuario = '$usuario_id'"; 
$result = $Conn->query($query);

if ($result) {
    session_destroy();
}

header("Location: ../../index.php");
?>
