<?php
session_start();
require_once 'conexion.php'; 

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $Conn->query("SELECT Count(*) as count FROM db_gu_usuarios WHERE u_usuario = '$username' AND u_password='$password'");
    $array= mysqli_fetch_array($sql);

    if ($array['count']>0) {
        $_SESSION['username']=$username;

        header('Location: ../../index.php');
    } else {
        header('Location: ../Vistas/login.php');
    }
?>
