<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Eliminar Usuario</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4" style="max-width:600px">
        <h3 class="text-danger">Confirmar Eliminación</h3>
        <a href="index.php" class="btn btn-secondary mb-3">← Volver</a>
        <div class="card border-danger shadow-sm p-4">
            <p class="text-muted mb-3">Los siguientes datos serán eliminados permanentemente:</p>
            <div class="mb-2"><strong>ID:</strong> <span id="user_id"></span></div>
            <div class="mb-2"><strong>Usuario:</strong> <span id="username"></span></div>
            <div class="mb-3"><strong>Correo:</strong> <span id="user_email"></span></div>
            <button onclick="eliminar()" class="btn btn-danger w-100">Confirmar Eliminación</button>
        </div>
    </div>
    <script>
        const params = new URLSearchParams(location.search);
        const userId = params.get('user_id');
        async function cargar() {
        const resp = await fetch(`http://localhost/DSSMarianaRamirez/Guia9/api.php/obtener/${userId}`);
        const u = await resp.json();
        document.getElementById('user_id').textContent = u.user_id;
        document.getElementById('username').textContent = u.username;
        document.getElementById('user_email').textContent = u.user_email;
        }
        async function eliminar() {
        const resp = await fetch(`http://localhost/DSSMarianaRamirez/Guia9/api.php/eliminar/${userId}`);
        if (resp.ok) {
            alert('Usuario eliminado exitosamente');
            location.href = 'index.php';
        } else {
            alert('Error al eliminar');
        }
        }
        cargar();
    </script>
</body>
</html>