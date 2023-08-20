<?php
session_start();
require_once '../Controller/conexion.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT DISTINCT td.td_tipoDocumentoId Id, td.td_tipoDocumento Documento 
          FROM db_gu_tipodocumento td;";

    $result = $Conn->query($query);
    if (!$result) {
        echo "Error en la consulta: " . mysqli_error($Conn);
    } else {
        $Doc = array(); 

        while ($fila = mysqli_fetch_assoc($result)) {
            $Doc[] = $fila;
        }

        if (!empty($Doc)) {
            $_SESSION['Doc'] = $Doc;
            header('Location: ../Vistas/usuarios.php');
        } else {
            echo "No se encontraron datos de usuario.";
        }
        
    }
} else {
    header('Location: ../../index.php');
}
?>
