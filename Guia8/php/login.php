<?php
session_start();
require_once 'conexion.php';

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE correo = :correo";
$stmt = $conexion->prepare($sql);
$stmt->execute([':correo' => $correo]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificación segura
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['nombre'];
    header("Location: ../welcome.php");
} else {
    header("Location: ./login.php?error=1");
}