<?php

// Configuración de la base de datos para XAMPP
$db_host = 'localhost';      // El servidor de la base de datos (normalmente localhost)
$db_user = 'root';           // El usuario de la base de datos (por defecto en XAMPP es root)
$db_pass = '';               // La contraseña de la base de datos (por defecto en XAMPP está vacía)
$db_name = 'hobbies_db'; // El nombre de la base de datos que creaste

// Crear la conexión
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>