<?php
session_start();

try {
    session_unset();    // Vacía las variables
    session_destroy();  // Borra la sesión
    
    // Redirige al login con una variable para confirmar
    header("Location: ../login.php?logout=1");
    exit(); 
} catch (Exception $e) {
    header("Location: ../login.php");
    exit();
}
