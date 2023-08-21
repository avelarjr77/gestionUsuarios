<?php
session_start();
require_once '../Controller/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $primerNombre = $_POST['primerNombre'];
    $segundoNombre = $_POST['segundoNombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $tipoDocumento = $_POST['tipoDoc'];
    $doc = $_POST['doc'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    
    $persona ="UPDATE   db_gu_personas SET
                        p_primerNombre=$primerNombre, 
                        p_segundoNombre=$segundoNombre, 
                        p_primerApellido=$primerApellido,
                        p_segundoApellido=$segundoApellido,
                        p_FKTipoDocumento=$tipoDumento, 
                        p_documentoIdentidad=$doc, 
                        p_correo=$correo, 
                        p_contacto=$celular, 
                        p_fechaCreacion= NOW()
                WHERE p_personaId=$id;";


    $result = $Conn->query($persona);
    if ($result==True) { 
        header('Location: datosUsuarioAll.php');           
    }
}
