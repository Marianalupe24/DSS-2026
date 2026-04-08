<?php
session_start();

// Seguridad: Si no hay sesión, al login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Asistencia - Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow text-center col-md-6 mx-auto">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="alert alert-success mb-3">✅ Asistencia marcada con éxito</div>
        <?php endif; ?>
        <h2 class="text-primary">Sistema de Control de Asistencia</h2>
        <hr>
        
        <div class="mb-4">
            <p class="mb-0 text-muted">Estudiante conectado:</p>
            <h4 class="fw-bold"><?php echo $_SESSION['user']; ?></h4>
        </div>

       <!-- Botón para marcar asistencia -->
<div class="d-grid gap-2 mb-4">
    <form action="./php/marcar_asistencia.php" method="POST">
        <div class="mb-3">
            <select name="materia" class="form-select" required>
                <option value="">Selecciona la materia...</option>
                <option value="Programación">Programación</option>
                <option value="Base de Datos">Base de Datos</option>
                <option value="Matemáticas">Matemáticas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success btn-lg w-100">
            Confirmar Asistencia
        </button>
    </form>
</div>
        <div class="d-flex justify-content-between">
            <span class="text-muted small">Fecha: <?php echo date("d/m/Y"); ?></span>
            <a href="./php/logout.php" class="btn btn-outline-danger btn-sm">Cerrar sesión</a>
        </div>
    </div>
</div>

</body>
</html>
