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
if (isset($data['nome'], $data['immagine'], $data['prezzo'])) {
    $nome = mysqli_real_escape_string($conn, $data['nome']);
    $immagine = mysqli_real_escape_string($conn, $data['immagine']);
    $prezzo = mysqli_real_escape_string($conn, $data['prezzo']);

    $query = "INSERT INTO prodotti (nome, immagine, prezzo, idutente) VALUES ('$nome', '$immagine', '$prezzo', '$userid')";
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Errore durante l\'aggiunta al carrello: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Dati non validi']);
}


error_log('Aggiungi.php è stato chiamato.');

$data = json_decode(file_get_contents('php://input'), true);
error_log('Dati ricevuti: ' . print_r($data, true));


mysqli_close($conn);

?>
