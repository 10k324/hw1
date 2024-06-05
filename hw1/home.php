<?php
require_once 'auth.php';
if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}

include 'config.php'; 

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordini</title>
    <link rel="stylesheet" href="hom.css">
    <script src="home.js" defer></script>
    <script src="cocktail.js" defer></script>
    
</head>
<body>
<header id="header" data-userid="<?php echo htmlspecialchars($userid); ?>">
    <nav id="nav-menu" class="hidden">
        <a href='logout.php' class="left-icon"><img src='immagini/logout.png' alt='Logout' class='menu-icon'></a>
        <span class="welcome-msg">Benvenuto, <?php echo htmlspecialchars($_SESSION["_agora_username"]); ?></span>
        <a href='carrello.php' class="right-icon"><img src='immagini/carrello.png' alt='ordine' class='menu-icon'></a>
    </nav>
</header>


    
<div class="barra1">
    <h1>PANINI</h1>
    <div class="panino">
        <div><img src="immagini/asiago.png" alt="The Speck & Asiago burger"></div>
        <strong>The Speck & Asiago burger</strong>
        <span class="prezzo">8.99 €</span>
        <button onclick="addToCart(1, 'The Speck & Asiago burger', 'immagini/asiago.png', 8.99)">Aggiungi al carrello</button>
    </div>
    <div class="panino">
        <div><img src="immagini/baconking.png" alt="Bacon King 3.0 Smokey"></div>
        <strong>Bacon King 3.0 Smokey</strong>
        <span class="prezzo">7.49 €</span>
        <button onclick="addToCart(2, 'Bacon King 3.0 Smokey', 'immagini/baconking.png', 7.49)">Aggiungi al carrello</button>
    </div>
    <div class="panino">
        <div><img src="immagini/parmigiano.png" alt="The Parmiggiano Reggiano Burger"></div>
        <strong>The Parmiggiano Reggiano Burger</strong>
        <span class="prezzo">9.99 €</span>
        <button onclick="addToCart(3, 'The Parmiggiano Reggiano Burger', 'immagini/parmigiano.png', 9.99)">Aggiungi al carrello</button>
    </div>
    <div class="panino">
        <div><img src="immagini/bacon.png" alt="Bacon King 3.0"></div>
        <strong>Bacon King 3.0</strong>
        <span class="prezzo">6.99 €</span>
        <button onclick="addToCart(4, 'Bacon King 3.0', 'immagini/bacon.png', 6.99)">Aggiungi al carrello</button>
    </div>
    <div class="panino">
        <div><img src="immagini/b.png" alt="Bacon King"></div>
        <strong>Bacon King</strong>
        <span class="prezzo">5.99 €</span>
        <button onclick="addToCart(5, 'Bacon King', 'immagini/b.png', 5.99)">Aggiungi al carrello</button>
    </div>
</div>

<div class="barra3">
    <h3>BIRRE</h3>
    <div class="birra">
        <div><img src="immagini/moretti.png" alt="moretti"></div>
        <strong>moretti</strong>
        <span class="prezzo">2.50 €</span>
        <button onclick="addToCart(11, 'moretti', 'immagini/moretti.png', 2.50)">Aggiungi al carrello</button>
    </div>
    <div class="birra">
        <div><img src="immagini/heineken.png" alt="heineken"></div>
        <strong>heineken</strong>
        <span class="prezzo">3.00 €</span>
        <button onclick="addToCart(12, 'heineken', 'immagini/heineken.png', 3.00)">Aggiungi al carrello</button>
    </div>
    <div class="birra">
        <div><img src="immagini/ichnusa.jpg" alt="ichnusa"></div>
        <strong>ichnusa</strong>
        <span class="prezzo">3.50 €</span>
        <button onclick="addToCart(13, 'ichnusa', 'immagini/ichnusa.jpg', 3.50)">Aggiungi al carrello</button>
    </div>
    <div class="birra">
        <div><img src="immagini/peroni.png" alt="peroni"></div>
        <strong>peroni</strong>
        <span class="prezzo">2.20 €</span>
        <button onclick="addToCart(14, 'peroni', 'immagini/peroni.png', 2.20)">Aggiungi al carrello</button>
    </div>
    <div class="birra">
        <div><img src="immagini/Castello.jpg" alt="castello"></div>
        <strong>castello</strong>
        <span class="prezzo">2.00 €</span>
        <button onclick="addToCart(15, 'castello', 'immagini/Castello.jpg', 2.00)">Aggiungi al carrello</button>
    </div>
    <div class="birra">
        <div><img src="immagini/dreher.jpg" alt="Dreher"></div>
        <strong>Dreher</strong>
        <span class="prezzo">2.70 €</span>
        <button onclick="addToCart(16, 'Dreher', 'immagini/dreher.jpg', 2.70)">Aggiungi al carrello</button>
    </div>
    <div class="birra">
        <div><img src="immagini/mcristalli.jpg" alt="messina cristalli di sale"></div>
        <strong>messina cristalli di sale</strong>
        <span class="prezzo">3.20 €</span>
        <button onclick="addToCart(17, 'messina cristalli di sale', 'immagini/mcristalli.jpg', 3.20)">Aggiungi al carrello</button>
    </div>
</div>


</body>
</html>

