<?php
session_start();
require_once 'conexion.php';

// Verificamos que haya sesión y que se haya enviado la materia
if (isset($_SESSION['user_id']) && isset($_POST['materia'])) {
    
    $id_usuario = $_SESSION['user_id']; // Obtenemos el ID de la sesión
    $materia = $_POST['materia'];
    $fecha = date("Y-m-d H:i:s");

    try {
        // La tabla 'asistencias' debe tener una columna 'usuario_id' (INT)
        $sql = "INSERT INTO asistencia (fecha, clase, id_estudiante) VALUES (:fecha, :clase, :id_estudiante)";
        $stmt = $conexion->prepare($sql);
        
        $stmt->execute([
            ':id_estudiante'      => $id_usuario,
            ':clase' => $materia,
            ':fecha'   => $fecha
        ]);

        header("Location: ../welcome.php?status=success");
        exit();

    } catch (PDOException $e) {

        header("Location: ../welcome.php?status=error");
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
