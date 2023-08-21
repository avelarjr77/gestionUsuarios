<?php
require_once 'conexion.php'; 
session_start();

if (isset($_SESSION['username'])) {
    $username = mysqli_real_escape_string($Conn, $_SESSION['username']); // Escapar la variable para evitar inyección SQL

    $rolUserQuery = "SELECT r.rp_rolPermisosNombre AS rolUsuario, r.rp_permisoVer AS Ver, r.rp_permisoCrear AS Crear, r.rp_permisoEliminar AS Eliminar, r.rp_permisoEditar AS Editar
    FROM db_gu_personas p
    INNER JOIN db_gu_usuarios u ON p.p_personaId = u.u_FkPersona
    INNER JOIN db_gu_rolpermisos r ON u.u_FKRol = r.rp_rolPermisosId
    WHERE u.u_usuario = '$username';";

    $result = $Conn->query($rolUserQuery);
    if (!$result) {
        echo "Error en la consulta: " . mysqli_error($Conn);
    } else {
        $rolUsuario = array(); 

        while ($fila = mysqli_fetch_assoc($result)) {
            $rolUsuario[] = $fila;
        }

        if (!empty($rolUsuario)) {
            $_SESSION['rolUsuario'] = $rolUsuario;
            header('Location: ../Vistas/usuarios.php');
        } else {
            header('Location: ../Vistas/login.php');
        }
    }
} else {
    header('Location: ../Vistas/login.php');
}
?>
