<?php

//Hacemos la conexion a la base de datos

$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar el estado de la conexión
    $status = $db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    echo "Estado de la conexión: $status";
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    exit();
}