<?php
session_start(); 
require_once '../Controller/conexion.php'; 

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; 

    $query = "CALL spDatosUsuario ('$username');";
    $consulta = mysqli_query($Conn, $query);

    if (!$consulta) {
        echo "Error en la consulta: " . mysqli_error($Conn); 
    } else {
        $datosUsuario = mysqli_fetch_assoc($consulta);
        
        if ($datosUsuario) {
            $_SESSION['datosUsuario'] = $datosUsuario;
            header('Location: ../../index.php');
        } else {
            echo "No se encontraron datos de usuario.";
        }
    }
} else {
    header('Location: ../../index.php'); 
}
?>
