
fetch('cocktail_api.php')
  .then(response => {
    if (!response.ok) {
      throw new Error('Errore nella richiesta.');
    }
    return response.json();
  })
  .then(data => {
    console.log(data); 
  })
  .catch(error => {
    console.error('Si è verificato un errore:', error);
  });
