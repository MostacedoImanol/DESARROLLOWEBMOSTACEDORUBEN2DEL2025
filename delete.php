<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: mishobbies.php');
    exit;
}

$sql = "SELECT * FROM hobbies WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$hobby = $result->fetch_assoc();

if ($hobby && file_exists($hobby['fotografia'])) {
    unlink($hobby['fotografia']);
}

$sql = "DELETE FROM hobbies WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header('Location: mishobbies.php');
    exit;
} else {
    echo "Ocurrió un error al eliminar el hobby.";
}
