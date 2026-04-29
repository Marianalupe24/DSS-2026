<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
include 'db.php';
$parts = explode('/', trim($_SERVER['PATH_INFO'] ?? '', '/'));
$opc = $parts[0] ?: ($_GET['opc'] ?? '');
$pathId = isset($parts[1]) && is_numeric($parts[1]) ? (int)$parts[1] : null;
try {
    switch ($opc) {
    case 'listar':
        $data = obtenerTodos();
        http_response_code(200);
        echo json_encode($data);
    break;
    case 'obtener':
        $id = $pathId ?? filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
        if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'ID inválido']);
    break;
    }
    $row = obtenerUsuario($id);
    if ($row) {
        http_response_code(200);
        echo json_encode($row);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Usuario no encontrado']);
    }
    break;
    case 'insertar':
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data || !isset($data['username'], $data['user_email'], $data['user_status'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Datos incompletos']);
    break;
    }
    $ok = insertar($data['username'], $data['user_email'], (int)$data['user_status']);
    http_response_code($ok ? 201 : 500);
    echo json_encode(['success' => $ok]);
    break;
    case 'editar':
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data || !isset($data['user_id'], $data['username'], $data['user_email'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Datos incompletos']);
    break;
    }
    $ok = editar((int)$data['user_id'], $data['username'], $data['user_email'], (int)$data['user_status']);
    http_response_code($ok ? 200 : 500);
    echo json_encode(['success' => $ok]);
    break;
    case 'eliminar':
    $id = $pathId ?? filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
    if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'ID inválido']);
        break;
    }
    $ok = eliminar($id);
    http_response_code($ok ? 200 : 500);
    echo json_encode(['success' => $ok]);
    break;
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Operación no válida']);
    }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
?> 