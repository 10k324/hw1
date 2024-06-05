function rimuoviProdotto(id) {
    fetch('rimuovi.php?userid=<?php echo htmlspecialchars($userid); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Prodotto rimosso dal carrello!');
            location.reload();
        } else {
            alert('Errore durante la rimozione del prodotto.');
        }
    })
    .catch(error => console.error('Error:', error));
}