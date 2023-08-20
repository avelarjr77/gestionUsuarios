<?php
session_start();
require_once '../Controller/conexion.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "select r_rolId Id, r_rol Rol from db_gu_rol WHERE r_FKEstado=1;";
    $consulta = mysqli_query($Conn, $query);

    if (!$consulta) {
        echo "Error en la consulta: " . mysqli_error($Conn);
    } else {
        $roles = array(); 

        while ($row = mysqli_fetch_assoc($consulta)) {
            $roles[] = $row;
        }

        if (!empty($roles)) {
            $_SESSION['Rol'] = $roles;
            header('Location: ../Vistas/usuarios.php');
        } else {
            echo "No se encontraron datos de usuario.";
        }
    }
} else {
    header('Location: ../../index.php');
}
?>
