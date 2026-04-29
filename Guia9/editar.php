<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Editar Usuario</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4" style="max-width:600px">
        <h3>Editar Usuario</h3>
        <a href="index.php" class="btn btn-secondary mb-3">← Volver</a>
        <div class="card shadow-sm p-4">
            <input type="hidden" id="user_id">
            <div class="mb-3">
                <label class="form-label fw-bold">Nombre de Usuario</label>
                <input type="text" id="username" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Correo Electrónico</label>
                <input type="email" id="user_email" class="form-control">
            </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Estado</label>
            <select id="user_status" class="form-select">
                <option value="1">Activo</option>
                <option value="0">De baja</option>
            </select>
        </div>
        <button onclick="actualizar()" class="btn btn-warning w-100">Actualizar Usuario</button>
        </div>
    </div>
    <script>
        const params = new URLSearchParams(location.search);
        const userId = params.get('user_id');
        async function cargar() {
        const resp = await fetch(`http://localhost/DSSMarianaRamirez/Guia9/api.php/obtener/${userId}`);
        const u = await resp.json();
        document.getElementById('user_id').value = u.user_id;
        document.getElementById('username').value = u.username;
        document.getElementById('user_email').value = u.user_email;
        document.getElementById('user_status').value = u.user_status;
        }
        async function actualizar() {
        const payload = {
        user_id: parseInt(document.getElementById('user_id').value),
        username: document.getElementById('username').value,
        user_email: document.getElementById('user_email').value,
        user_status: parseInt(document.getElementById('user_status').value)
        };
        const resp = await fetch('http://localhost/DSSMarianaRamirez/Guia9/api.php/editar', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
        });
        if (resp.ok) {
            alert('Usuario actualizado exitosamente');
            location.href = 'index.php';
        } else {
            alert('Error al actualizar');
        }
        }
        cargar();
    </script>
</body>
</html>