<?php
session_start();
require_once '../Controller/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fkUsuario = $_POST['fkUsuario'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $rol = $_POST['rol'];

    $userSave = "INSERT INTO db_gu_usuarios(u_FkPersona, u_usuario, u_password, u_FKRol, u_FKEstado)
            VALUES($PersonId, '$usuario', '$pass',$rol,1);";
    $result = $Conn->query($userSave);

    if ($result == True) {
        header('Location: datosUsuarioAll.php');
    }
}
