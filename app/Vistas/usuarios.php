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
    <title>Usuarios</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-ms-12">
        <div class="row">
            <a href="../../index.php" class="button">Inicio</a>
        </div>
    </div>
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        
            <div class="card">
                <center>
                <div class="card-header gray">Usuarios</div>
                <div class="card-body">
            <table>
                
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Contacto</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                <?php 
                    if (isset($_SESSION['AllUsers'])) {
                        $AllUsers=$_SESSION['AllUsers'];

                        foreach ($AllUsers as $campo => $valor) {
                        echo "<td>$valor</td>";
                        } 
                    } else {
                        echo "<tr><td colspan='4'>Los datos de usuario no estan disponible.</td></tr>";
                    }
                    ?>
                    </tr>
                </tbody>
            </table>
            <div>
            </center>
            </div>
        </div>
        <div class="col-md-8"></div>
    </div>
    
</body>
</html>