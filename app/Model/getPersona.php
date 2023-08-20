<?php
session_start();
require_once '../Controller/conexion.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT p_personaId Id,
    CONCAT(
        COALESCE(p_primerNombre, ''),
        ' ',
        COALESCE(p_segundoNombre, ''),
        ' ',
        COALESCE(p_primerApellido, ''),
        ' ',
        COALESCE(p_segundoApellido, '')
    ) AS Persona
    FROM db_gu_personas;";

    $result = $Conn->query($query);
    if (!$result) {
        echo "Error en la consulta: " . mysqli_error($Conn);
    } else {
        $Persona = array(); 

        while ($fila = mysqli_fetch_assoc($result)) {
            $Persona[] = $fila;
        }

        if (!empty($Persona)) {
            $_SESSION['Persona'] = $Persona;
            header('Location: ../Vistas/usuarios.php');
        } else {
            echo "No se encontraron datos de usuario.";
        }
        
    }
} else {
    header('Location: ../../index.php');
}
?>
