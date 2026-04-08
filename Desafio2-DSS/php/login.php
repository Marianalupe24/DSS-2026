<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo = :correo";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([':correo' => $correo]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true); 
        $_SESSION['user'] = $user['nombre'];
        $_SESSION['user_id'] = $user['id']; 
        header("Location: ../welcome.php");
        exit(); 
    } else {
       
        header("Location: ../login.php?error=1");
        exit();
    }
} else {
    
    header("Location: ../login.php");
    exit();
}
?>