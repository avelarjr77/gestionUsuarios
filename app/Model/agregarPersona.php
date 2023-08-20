<?php
session_start();
require_once '../Controller/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $primerNombre = $_POST['primerNombre'];
    $segundoNombre = $_POST['segundoNombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $tipoDocumento = $_POST['tipoDoc'];
    $doc = $_POST['doc'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    
    $persona ="INSERT INTO db_gu_personas (
        p_primerNombre, p_segundoNombre, p_primerApellido, p_segundoApellido,
        p_FKTipoDocumento, p_documentoIdentidad, p_correo, p_contacto, p_FKEstado, p_fechaCreacion
    )
    VALUES (
        '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido',
        $tipoDocumento, '$doc', '$correo', '$celular', 1, NOW()
    );";


    $result = $Conn->query($persona);
    if ($result==True) { 
        header('Location: datosUsuarioAll.php');           
    }
}
