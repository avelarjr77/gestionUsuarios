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
        <a class="nav-link" href="#">Usuarios</a>
      </li>
      <li class="nav-item navbar-right">
        <a class="navbar-brand mr-6 mr-md-10" href="app/Controller/sessionExit.php">Cerrar sesión</a>
      </li>
    </ul>
  </div>
  <br>
  <div id="content center">
    <table id="userTable" class="display">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <!-- Add more table header columns as needed -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>john@example.com</td>
          <!-- Add more table rows as needed -->
        </tr>
      </tbody>
    </table>
  </div>

 

 
</body>
<footer>
<div id="footer">
    <!-- Your footer content goes here -->
  </div>
</footer>
<script src="public/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  
<script src="public/datatables.min.js"></script>
</html>
