
function addToCart(id, nome, immagine, prezzo) {
    fetch('aggiungi.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id, nome, immagine, prezzo })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Prodotto aggiunto al carrello!');
        } else {
            alert('Errore durante l\'aggiunta al carrello.');
        }
    })
    .catch(error => console.error('Error:', error));
}

