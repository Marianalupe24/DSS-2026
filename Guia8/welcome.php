<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Bienvenida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow text-center col-md-5 mx-auto">
        <h2>Helloo!!, hii!!</h2>
        <h4><?php echo $_SESSION['user']; ?></h4>

        <p class="mt-3">Inicio de sesión exitoso.</p>

        <a href="./php/logout.php" class="btn btn-primary">Cerrar sesión</a>
    </div>
</div>

</body>
</html>