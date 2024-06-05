<?php
require_once 'auth.php';
if (!$userid = checkAuth()) {
    echo json_encode(['success' => false, 'message' => 'User not authenticated']);
    exit;
}

include 'config.php';

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . mysqli_connect_error()]);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'])) {
    $id = mysqli_real_escape_string($conn, $data['id']);
    
    $query = "DELETE FROM prodotti WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Errore durante la rimozione del prodotto: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Dati non validi']);
}

mysqli_close($conn);
?>
