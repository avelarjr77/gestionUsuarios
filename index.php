<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: app/Vistas/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios</title>

    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
    <link href="public/datatables.min.css" rel="stylesheet">
</head>
<body>
  <div id="header">
    <ul class="nav nav-pills">
      
      <li class="nav-item">
        <a class="nav-link" href="#">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="app/Vistas/usuarios.php">Usuarios</a>
      </li>
      <li class="nav-item navbar-right">
        <a class="navbar-brand mr-6 mr-md-10" href="app/Controller/sessionExit.php">Cerrar sesión</a>
      </li>
    </ul>
  </div>
  <br>
  <div class="container">
    <div class="container-md col-md-10">
    <h1>Bienvenido: <?php echo $_SESSION['username'] ?></h1><br>

    </div>
  </div>
  <div id="content center">
    <div class="container-md col-md-2">

    </div>
    <div class="container-md col-md-8">
    <table id="userTable" class="display">
      <h3><b>Datos de usuario:</b></h3>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Contacto</th>
          <th>Correo</th>
          <th>Sesión</th>
          <!-- Add more table header columns as needed -->
        </tr>
      </thead>
      <tbody>
          <?php 
          if (isset($_SESSION['datosUsuario'])) {
            $datosUsuario=$_SESSION['datosUsuario'];

            foreach ($datosUsuario as $campo => $valor) {
              echo "<tr>";
              echo "<td>$valor</td>";
              echo "</tr>";
            } 
          } else {
            echo "<tr><td colspan='4'>Los datos de usuario no estan disponible.</td></tr>";
          }
          ?>
      </tbody>
    </table>
    </div>
    <div class="container-md col-md-2">

    </div>
  </div>

 

 
</body>
<footer>
<div id="footer">
    <!-- Your footer content goes here -->
  </div>
</footer>
<script src="public/DataTables/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  
<script src="public/datatables.min.js"></script>
</html>
