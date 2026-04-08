<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    
    <div class="card p-4 shadow col-md-4 mx-auto">
        
        <h3 class="text-center mb-3">Iniciar Sesión</h3>

       <?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Credenciales incorrectas
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

        <form action="./php/login.php" method="POST">
            <input class="form-control mb-3" type="email" name="correo" placeholder="Correo" required>
            <input class="form-control mb-3" type="password" name="password" placeholder="Contraseña" required>
            <button class="btn btn-primary w-100">Ingresar</button>
        </form>

        <a href="registro.php" class="mt-3 d-block text-center">Crear cuenta</a>
    </div>
</div>

</body>
</html>