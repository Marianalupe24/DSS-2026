<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro</title>
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow col-md-4 mx-auto">
        <h3 class="text-center mb-3">Registro</h3>

        <form action="./php/registro.php" method="POST">
            <input class="form-control mb-3" type="text" name="nombre" placeholder="Nombre completo" required>
            <input class="form-control mb-3" type="email" name="correo" placeholder="Correo" required>
            <input class="form-control mb-3" type="password" name="password" placeholder="Contraseña" required>
            <button class="btn btn-success w-100">Registrarse</button>
        </form>

        <a href="login.php" class="mt-3 d-block text-center">Volver al login</a>
    </div>
</div>

</body>
</html>