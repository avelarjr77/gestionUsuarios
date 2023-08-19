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
        $AllUsers = mysqli_fetch_assoc($consulta);
        
        if ($AllUsers) {
            $_SESSION['AllUsers'] = $AllUsers;
        } else {
            echo "No se encontraron datos de usuario.";
        }
    }
} else {
    echo "Usuario no válido"; 
}
?>
