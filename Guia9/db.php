<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'rest_api_demo');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');
function getConnection(): PDO {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false, 
];
    return new PDO($dsn, DB_USER, DB_PASS, $options);
}
function obtenerTodos(): array {
    $pdo = getConnection();
    $stmt = $pdo->query('SELECT * FROM users ORDER BY user_id DESC');
    return $stmt->fetchAll();
}
function obtenerUsuario(int $id): array|false {
    $pdo = getConnection();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}
function insertar(string $username, string $email, int $status): bool {
    $pdo = getConnection();
    $stmt = $pdo->prepare(
    'INSERT INTO users (username, user_email, user_status) VALUES (?, ?, ?)'
);
return $stmt->execute([$username, $email, $status]);
}
function editar(int $id, string $username, string $email, int $status): bool {
    $pdo = getConnection();
    $stmt = $pdo->prepare(
    'UPDATE users SET username=?, user_email=?, user_status=? WHERE user_id=?'
);
return $stmt->execute([$username, $email, $status, $id]);
}
function eliminar(int $id): bool {
    $pdo = getConnection();
    $stmt = $pdo->prepare('DELETE FROM users WHERE user_id = ?');
    return $stmt->execute([$id]);
}
?>