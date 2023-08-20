<?php
session_start();

if (!isset($_SESSION['AllUsers'])) {
    header('Location: ../Model/datosUsuarioAll.php');

    exit();
}
if (!isset($_SESSION['Rol'])) {
    header('Location: ../Model/getRol.php');
    exit();
}
if (!isset($_SESSION['Doc'])) {
    header('Location: ../Model/getDocumento.php');
    exit();
}
if (!isset($_SESSION['Persona'])) {
    header('Location: ../Model/getPersona.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container col-ms-12">
        <div class="row">
            <a href="../../index.php" class="button">Inicio</a>
        </div>
    </div>
    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="card">
                <center>
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h2 class="sub-header" style="margin: 0;">Usuarios</h2>
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-persona">
                                <i class="fa fa-plus-square-o" aria-hidden="true"></i> Agregar Persona
                            </button>
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-usuario">
                                <i class="fa fa-plus-square-o" aria-hidden="true"></i> Agregar usuario
                            </button>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Usuario</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th>Contacto</th>
                                        <th>Correo</th>
                                        <th colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        if (isset($_SESSION['AllUsers'])) {
                                            $AllUsers = $_SESSION['AllUsers'];

                                            foreach ($AllUsers as $usuario) {
                                                echo "<tr>";
                                                echo "<td>" . $usuario['Nombres'] . "</td>";
                                                echo "<td>" . $usuario['Apellidos'] . "</td>";
                                                echo "<td>" . $usuario['Usuario'] . "</td>";
                                                echo "<td>" . $usuario['Rol'] . "</td>";
                                                echo "<td>" . $usuario['Estado'] . "</td>";
                                                echo "<td>" . $usuario['Contacto'] . "</td>";
                                                echo "<td>" . $usuario['Correo'] . "</td>";
                                        ?>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#editModal" data-id="<?php echo $usuario['Id']; ?>">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-toggle="modal" id="eliminarButton" data-target="#eliminaModal" data-id="<?php echo $usuario['Id']; ?>">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'>Los datos de usuario no están disponibles.</td></tr>";
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

    <!-- MODAL PARA AGREGAR PERSONA -->
    <div class="modal fade" id="modal-persona" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModal-label">Agregar persona</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="../Model/agregarUsuario.php" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="primerNombre">Primer nombre</label>
                                    <input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Nombre" required="required">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="segundoNombre">Segundo nombre</label>
                                    <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" placeholder="Nombre" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="primerApellido">Primer apellido</label>
                                    <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Apellido" required="required">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="segundoApellido">Segundo apellido</label>
                                    <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Apellido" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="celular">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" v placeholder="Celular">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="correo">Correo</label>
                                    <input type="email" class="form-control" required="required" id="correo" name="correo" placeholder="Correo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Tipo documento</label>
                                    <select class="form-control" id="tipoDoc">
                                        <option value="">Seleccionar...</option>
                                        <?php

                                        if (isset($_SESSION['Doc'])) {
                                            $Doc = $_SESSION['Doc'];

                                            foreach ($Doc as $Documento) { ?>
                                                <option value="<?php echo $Documento['Id']; ?>"><?php echo $Documento['Documento']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="doc">Documento</label>
                                    <input type="text" class="form-control" id="doc" required="required" name="doc" placeholder="Correo">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Limpiar</button>
                    <button type="button" class="btn btn-success" name="save" id="btnAgregar">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FINAL DE MODAL -->

    <!-- MODAL PARA AGREGAR USUARIO -->
    <div class="modal fade" id="modal-usuario" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModal-label">Ingresar Usuario</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="../Model/agregarUsuario.php" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Seleccionar persona</label>
                                    <select class="form-control" id="fkUsuario">
                                        <option value="">Seleccionar...</option>
                                        <?php
                                        if (isset($_SESSION['Persona'])) {
                                            $Persona = $_SESSION['Persona'];

                                            foreach ($Persona as $Per) {
                                        ?>
                                                <option value="<?php echo $Per['Id'] ?>" required="required"><?php echo $Per['Persona'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Rol</label>
                                    <select class="form-control" id="rol">
                                        <option value="">Seleccionar...</option>
                                        <?php
                                        if (isset($_SESSION['Rol'])) {
                                            $roles = $_SESSION['Rol'];

                                            foreach ($roles as $rol) {
                                        ?>
                                                <option value="<?php echo $rol['Id'] ?>" required="required"><?php echo $rol['Rol'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="usuario">Usuario</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required="required">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="pass">Contraseña</label>
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required="required">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Limpiar</button>
                    <button type="button" class="btn btn-success" name="btnAgregarU" id="btnAgregarU">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FINAL DE MODAL -->

    <!-- Modal para Editar Usuario -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editaModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="editaModalLabel">Editar Usuario</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="primerNombre">Primer nombre</label>
                                    <input type="text" class="form-control primerNombreE" id="primerNombreE" placeholder="Nombre">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="segundoNombre">Segundo nombre</label>
                                    <input type="text" class="form-control segundoNombreE" id="segundoNombreE" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="primerApellido">Primer apellido</label>
                                    <input type="text" class="form-control primerApellidoE" id="primerApellidoE" placeholder="Apellido">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="segundoApellido">Segundo apellido</label>
                                    <input type="text" class="form-control segundoApellidoE" id="segundoApellidoE" placeholder="Apellido">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="usuario">Usuario</label>
                                    <input type="text" class="form-control usuarioE" id="usuarioE" placeholder="Usuario">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="pass">Contraseña</label>
                                    <input type="password" class="form-control passE" id="passE" placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" for="rol">Rol</label>
                                        <select class="form-control rolE" id="rolE">
                                            <option value="admin">Administrador</option>
                                            <option value="user">Usuario</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="celular">Celular</label>
                                        <input type="text" class="form-control celularE" id="celularE" placeholder="Celular">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="correo">Correo</label>
                                            <input type="email" class="form-control correoE" id="correoE" placeholder="Correo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="guardarEdicion()">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para Eliminar Usuario -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" role="dialog" aria-labelledby="eliminaModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="eliminaModalLabel">Eliminar Usuario</h4>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                </div>
                <div class="modal-footer">
                    <form role="form" action="../Model/eliminarUsuario.php" method="POST">
                        <input type="hidden" class="id" name="id" id="id">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" id="confirmarEliminacion">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function agregarPersona() {
            var primerNombre = document.getElementById("primerNombre").value;
            var segundoNombre = document.getElementById("segundoNombre").value;
            var primerApellido = document.getElementById("primerApellido").value;
            var segundoApellido = document.getElementById("segundoApellido").value;
            var celular = document.getElementById("celular").value;
            var tipoDoc = document.getElementById("tipoDoc").value;
            var doc = document.getElementById("doc").value;
            var correo = document.getElementById("correo").value;

            var datos = {
                primerNombre: primerNombre,
                segundoNombre: segundoNombre,
                primerApellido: primerApellido,
                segundoApellido: segundoApellido,
                celular: celular,
                tipoDoc: tipoDoc,
                doc: doc,
                correo: correo
            };

            $.ajax({
                type: "POST",
                url: "../Model/agregarPersona.php",
                data: datos,
                success: function(response) {
                    console.log(response); 
                    location.reload();
                },
                error: function(error) {
                    console.error("Error al enviar los datos:", error);
                }
            });
        }

        document.getElementById("btnAgregar").addEventListener("click", agregarPersona);
    </script>
    <script>
        function agregarUsuario() {
            var fkUsuario = document.getElementById("fkUsuario").value;
            var rol = document.getElementById("rol").value;
            var usuario = document.getElementById("usuario").value;
            var pass = document.getElementById("pass").value;

            var datos = {
                fkUsuario: fkUsuario,
                rol: rol,
                usuario: usuario,
                pass: pass
            };

            $.ajax({
                type: "POST",
                url: "../Model/agregarUsuario.php",
                data: datos,
                success: function(response) {
                    console.log(response); 
                    location.reload();
                },
                error: function(error) {
                    console.error("Error al enviar los datos:", error);
                }
            });
        }

        document.getElementById("btnAgregarU").addEventListener("click", agregarUsuario);
    </script>

    <script>
        $(document).ready(function() {
            var userIdToDelete = null;

            $('.btn-danger').click(function() {
                userIdToDelete = $(this).data('id'); 
            });

            $('#confirmarEliminacion').click(function() {
                if (userIdToDelete !== null) {
                    $.ajax({
                        type: "POST",
                        url: "../Model/eliminarUsuario.php",
                        data: {
                            userId: userIdToDelete // 
                        },
                        success: function(response) {
                            console.log(response);
                            location.reload();
                        },
                        error: function(error) {
                            console.error("Error al eliminar el usuario:", error);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $('.btn-edit').on('click', function() {
                const id = $(this).data('id');
                const nombres = $(this).closest('tr').find('.nombres').text();
                const apellidos = $(this).closest('tr').find('.apellidos').text();
                const usuario = $(this).closest('tr').find('.usuario').text();
                const rol = $(this).closest('tr').find('.rol').text();
                const estado = $(this).closest('tr').find('.estado').text();
                const contacto = $(this).closest('tr').find('.contacto').text();
                const correo = $(this).closest('tr').find('.correo').text();

                $('#id').val(id);
                $('#primerNombreE').val(nombres);
                $('#segundoNombreE').val(segundoNombreE);
                $('#primerApellidoE').val(primerApellidoE);
                $('#segundoApellidoE').val(segundoApellidoE);
                $('#usuarioE').val(usuarioE);
                $('#passE').val(passE);
                $('#rolE').val(rolE);
                $('#celularE').val(celularE);
                $('#tipoDocumentoE').val(tipoDocumentoE);
                $('#docE').val(docE);
                $('#correoE').val(correoE);

                $('#editModal').modal('show');


            });

            $('.btn-delete').on('click', function() {

                const id = $(this).data('id');

                $('.id').val(id);

                $('#eliminaModal').modal('show');
            });

        });
    </script>

</body>

</html>