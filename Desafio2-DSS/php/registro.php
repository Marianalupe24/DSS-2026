<?php
require_once 'conexion.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];

// Encriptar contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, correo, password)
        VALUES (:nombre, :correo, :password)";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ':nombre' => $nombre,
    ':correo' => $correo,
    ':password' => $hash
]);

header("Location: ../login.php");