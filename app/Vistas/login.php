<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="public/bootstrap/css/css/bootstrap.min.css">
</head>
<body>
    <center>
    <div class="container center">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h2>Iniciar Sesión</h2>
                <form action="../Controller/sesion.php" method="post">
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
    </center>
</body>
</html>
