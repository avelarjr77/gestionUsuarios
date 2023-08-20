<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: app/Vistas/login.php');
  exit();
}

if (!isset($_SESSION['datosUsuario'])) {
  header('Location: app/Model/datosUsuario');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de usuarios</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
  <div id="header">
    <ul class="nav nav-pills">

      <li class="nav-item">
        <a class="nav-link" href="#">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="app/Model/datosUsuarioAll.php">Usuarios</a>
      </li>
      <li class="nav-item navbar-right">
        <a class="navbar-brand mr-6 mr-md-10" href="app/Controller/sessionExit.php">Cerrar sesión</a>
      </li>
    </ul>
  </div>
  <br>
  <div class="container">
    <div class="container-md col-md-10">
      <h1>Bienvenido:
        <?php echo $_SESSION['username'] ?>
      </h1><br>

    </div>
  </div>
  <div id="content center">
    <div class="container-md col-md-2">

    </div>
    <div class="container-md col-md-8">
      <div class="table-responsive">
        <table class="table table-striped">
          <h3><b>Datos de usuario:</b></h3>
          
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Contacto</th>
              <th>Correo</th>
              <th>Última conexión</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
            if (isset($_SESSION['datosUsuario'])) {
              $datosUsuario = $_SESSION['datosUsuario'];

              foreach ($datosUsuario as $campo => $valor) {
                echo "<td>$valor</td>";
              }
            } else {
              echo "<tr><td colspan='4'>Los datos de usuario no estan disponible.</td></tr>";
            }
            ?>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="container-md col-md-2">

      </div>
    </div>
  </div>




</body>
<footer>
  <div id="footer">
  </div>
</footer>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>