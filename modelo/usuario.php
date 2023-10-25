<?php
require_once 'config.php';

class Usuario {
    private $id;
    private $nombre;
    private $usuario;
    private $pass;
    private $id_rol;

    public function __construct($id, $nombre, $usuario, $pass, $id_rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->id_rol = $id_rol;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getIdRol() {
        return $this->id_rol;
    }

    public static function obtenerUsuario($id) {
        global $db;

        $query = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Usuario($row['id'], $row['nombre'], $row['usuario'], $row['pass'], $row['id_rol']);
        } else {
            return null;
        }
    }

    public static function obtenerUsuarios() {
        global $db;

        $query = "SELECT * FROM usuarios";
        $stmt = $db->prepare($query);
        $stmt->execute();

        $usuarios = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario($row['id'], $row['nombre'], $row['usuario'], $row['pass'], $row['id_rol']);
        }

        return $usuarios;
    }

    public static function agregarUsuario($nombre, $usuario, $pass, $id_rol) {
        global $db;

        $query = "INSERT INTO usuarios (nombre, usuario, pass, id_rol) VALUES (:nombre, :usuario, :pass, :id_rol)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':id_rol', $id_rol);
        $stmt->execute();

        return $db->lastInsertId();
    }

    public static function editarUsuario($id, $nombre, $usuario, $pass, $id_rol) {
        global $db;

        $query = "UPDATE usuarios SET nombre = :nombre, usuario = :usuario, pass = :pass, id_rol = :id_rol WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':id_rol', $id_rol);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public static function eliminarUsuario($id) {
        global $db;

        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>
