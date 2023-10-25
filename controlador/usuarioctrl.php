<?php
require_once 'modelo/Usuario.php';

class UsuarioController {
    public static function mostrarUsuario($id) {
        $usuario = Usuario::obtenerUsuario($id);

        if ($usuario) {
            include '';
        } else {
            echo "Usuario no encontrado";
        }
    }

    public static function mostrarUsuarios() {
        $usuarios = Usuario::obtenerUsuarios();
        include '';
    }

    public static function agregarUsuario($nombre, $usuario, $pass, $id_rol) {
        $nuevoId = Usuario::agregarUsuario($nombre, $usuario, $pass, $id_rol);
        header("Location: controlador.php?action=mostrar&id=$nuevoId");
        exit();
    }

    public static function editarUsuario($id, $nombre, $usuario, $pass, $id_rol) {
        Usuario::editarUsuario($id, $nombre, $usuario, $pass, $id_rol);
        header("Location: controlador.php?action=mostrar&id=$id");
        exit();
    }

    public static function eliminarUsuario($id) {
        Usuario::eliminarUsuario($id);
        header("Location: controlador.php?action=listar");
        exit();
    }
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'mostrar':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        UsuarioController::mostrarUsuario($id);
        break;
    case 'listar':
        UsuarioController::mostrarUsuarios();
        break;
    case 'agregar':
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
        $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
        $id_rol = isset($_POST['id_rol']) ? $_POST['id_rol'] : '';
        UsuarioController::agregarUsuario($nombre, $usuario, $pass, $id_rol);
        break;
    case 'editar':
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
        $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
        $id_rol = isset($_POST['id_rol']) ? $_POST['id_rol'] : '';
        UsuarioController::editarUsuario($id, $nombre, $usuario, $pass, $id_rol);
        break;
    case 'eliminar':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        UsuarioController::eliminarUsuario($id);
        break;
    default:
        UsuarioController::mostrarUsuarios();
        break;
}
?>
