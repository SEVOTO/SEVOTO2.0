<?php
require_once 'config.php';

class Usuario {
    private $id;
    private $nombre;
    private $usuario;
    private $pass;
    private $id_rol;

    // Constructor
    public function __construct($id, $nombre, $usuario, $pass, $id_rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->id_rol = $id_rol;
    }

    // Getters y setters
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

    // Método para obtener un usuario por nombre de usuario y contraseña
    public static function obtenerUsuario($usuario, $pass) {
        global $db;

        $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Usuario($row['id'], $row['nombre'], $row['usuario'], $row['pass'], $row['id_rol']);
        } else {
            return false;
        }
    }
}

class Rol {
    private $id;
    private $descripcion;

    // Constructor
    public function __construct($id, $descripcion) {
        $this->id = $id;
        $this->descripcion = $descripcion;
    }

    // Getters y setters
    public function getId() {
        return $this->id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    // Método para obtener un rol por ID
    public static function obtenerRol($id) {
        global $db;

        $query = "SELECT * FROM rol WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Rol($row['id'], $row['descripcion']);
        } else {
            return false;
        }
    }
}
?>
