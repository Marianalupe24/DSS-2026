<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Nuevo Usuario</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4" style="max-width:600px">
    <h3>Crear Nuevo Usuario</h3>
    <a href="index.php" class="btn btn-secondary mb-3">← Volver</a>
    <div class="card shadow-sm p-4">
    <div class="mb-3">
    <label class="form-label fw-bold">Nombre de Usuario</label>
    <input type="text" id="username" class="form-control" placeholder="Ej: juan.perez">
    </div>
    <div class="mb-3">
    <label class="form-label fw-bold">Correo Electrónico</label>
    <input type="email" id="user_email" class="form-control" placeholder="correo@ejemplo.com">
    </div>
    <div class="mb-3">
    <label class="form-label fw-bold">Estado</label>
    <select id="user_status" class="form-select">
    <option value="1">Activo</option>
    <option value="0">De baja</option>
    </select>
    </div>
    <button onclick="guardar()" class="btn btn-success w-100">Guardar Usuario</button>
    </div>
    </div>
    <script>
    async function guardar() {
    const payload = {
    username: document.getElementById('username').value,
    user_email: document.getElementById('user_email').value,
    user_status: parseInt(document.getElementById('user_status').value)
    };
    const resp = await fetch('http://localhost/DSSMarianaRamirez/Guia9/api.php/insertar', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload)
    });
    if (resp.status === 201) {
    alert('Usuario creado exitosamente');
    location.href = 'index.php';
    } else {
    alert('Error al crear el usuario');
    }
    }
    </script>
</body>
</html>