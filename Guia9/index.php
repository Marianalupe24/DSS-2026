<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>CRUD con API REST</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Gestión de Usuarios <span class="badge bg-primary fs-6">REST API</span></h2>
        <a href="nuevo.php" class="btn btn-success">+ Nuevo Usuario</a>
    </div>
    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-primary">
            <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <tr>
            <td colspan="5" class="text-center">Cargando...</td>
            </tr>
        </tbody>
    </table>

    
    
</div>
<script>
    async function cargarUsuarios() {
    const resp = await fetch('http://localhost/DSSMarianaRamirez/Guia9/api.php/listar');
    const data = await resp.json();
    const tbody = document.getElementById('tableBody');
    tbody.innerHTML = data.map(u => `
    <tr>
    <td>${u. user_id }</td>
    <td>${u.username}</td>
    <td>${u.user_email}</td>
    <td><span class="badge ${u.user_status == 1 ? 'bg-success' : 'bg-secondary'}">${u.user_status == 1 ?
    'Activo' : 'De baja'}</span></td>
    <td>
    <a href="editar.php?user_id=${u.user_id}" class="btn btn-warning btn-sm">Editar</a>
    <a href="eliminar.php?user_id=${u.user_id}" class="btn btn-danger btn-sm">Eliminar</a>
    </td>
    </tr>`).join('');
    }
    cargarUsuarios();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>