<?php
session_start();
require_once '../Controller/conexion.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

  $id =$Conn->real_escape_string($_POST['id']);

  $sql ="DELETE FROM db_gu_personas WHERE p_personaId= $id;";
  if ($Conn->query($sql)) {
    
  }
  header('Location: datosUsuarioAll.php');
}
?>
