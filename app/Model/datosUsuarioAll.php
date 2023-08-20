<?php
session_start(); 
require_once '../Controller/conexion.php'; 

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; 

    $query = "CALL spDataUsersAll;";
    $consulta = mysqli_query($Conn, $query);

    if (!$consulta) {
        echo "Error en la consulta: " . mysqli_error($Conn);
    } else {
        $AllUsers = array(); 

        while ($fila = mysqli_fetch_assoc($consulta)) {
            $AllUsers[] = $fila; 
        }

        if (!empty($AllUsers)) {
            $_SESSION['AllUsers'] = $AllUsers;
            header('Location: ../Vistas/usuarios.php');
        } else {
            echo "No se encontraron datos de usuario.";
        }
    }
} else {
    header('Location: ../../index.php');
}
?>

