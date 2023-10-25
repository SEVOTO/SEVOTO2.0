<?php
session_start();

require_once '../modelo/login.php';
require_once '../vista/home.php';

// Obtener los datos enviados por el formulario de inicio de sesión
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

// Lógica para manejar el inicio de sesión
if (!empty($usuario) && !empty($pass)) {
    $usuario = Usuario::obtenerUsuario($usuario, $pass);

    if ($usuario) {
        // Verificar si el rol del usuario ya tiene una sesión abierta
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == $usuario->getIdRol()) {
            echo '<script>alert("Ya tienes una sesión abierta en este rol.");</script>';
            if (isset($_SESSION['rol'])) {
                // Destruir la sesión actual
                    session_unset();
                    session_destroy();
        header("Location: ../index.php");
        exit();
    }

        } else {
            $_SESSION['usuario'] = $usuario->getUsuario();
            $_SESSION['rol'] = $usuario->getIdRol();
            if ($usuario->getIdRol() == 1) {
                header("Location: ../vista/admin/home.php");
                exit();
            } else {
                header("Location: ../vista/home.php");
                exit();
            }
        }
    } else {
        echo '<script>alert("Usuario o contraseña incorrectos.");</script>';
        header("Location: ../index.php");
    }
}

// Lógica para manejar el cierre de sesión
if (isset($_GET['logout']) && $_GET['logout'] == true) {
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}
?>
