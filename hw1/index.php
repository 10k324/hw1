 <!DOCTYPE html>
<html>
<head>
    <title>Burger King - Italia</title>
    <link rel="stylesheet" type="text/css" href="mhw3.css">
    <script src="mhw3.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
</head>
<body>
    <header id="header">
        <div class="header">
            <form action="login.php" method="post">
                <div class="container">
                        <button   type="submit" class="signupbtn">Login</button>
                </div>
            </form>
            <div class="logo">
                <img src="immagini/logo_colore.svg">
            </div>
            <div class="menu" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>

    <div id="menuContent" class="menu-content">
        <p onclick="scrollToPanini()">Panini</p>
        <p onclick="scrollToCocktail()">Cocktail</p>
    </div>

    <div id="offerta">
        <div id="boxburger">
            <img src="immagini/222_desktop_it.png">
        </div>
        <h1>
            <p> È tornata una vecchia fiamma tra i Kolossals</p><br>
            <strong>Voglia di tutto? American Complete!</strong><br>
            <p>Carne alla griglia e frittella di patate: cotti l'una per l'altra.</p>
            <p>Gusta la perfezione della carne alla fiamma abbinata alla frittella di patate croccante. Puoi averlo anche con cotoletta di pollo oppure nella versione Plant-Based.</p>
            <div class="pulsante">
                <p>Scopri i Gusti</p>
            </div>
        </h1>
    </div>

    <div id="app">
        <div class="barra"></div>
        <span class="scarica-app">
            <div>
                <img src="immagini/ingredienti.png">
            </div>
            <h5><strong>scarica app Burger King!</strong>
                <p>scarica app, registrati e ordina in modo facile e veloce.</p>
            </h5>
        </span>
    </div>

    <div id="i-nostri-prodotti">
        <div class="barra1">
            <span class="i-nostri-prodotti"></span>
            <strong>I Nostri Prodotti</strong>
        </div>
        <div class="barra2">
            <span class="Best-Seller">
                <p>Best-Seller</p>
            </span>
            <span class="Italian-Kings">
                <p>Italian Kings</p>
            </span>
            <span class="Manzo">
                <p>Manzo</p>
            </span>
        </div>
        <div class="barra3">
            <div class="panino" data-index="1">
                <div><img src="immagini/asiago.png"></div>
                <strong>The Speck & Asiago burger</strong>
            </div>
            <div class="panino" data-index="2">
                <div><img src="immagini/baconking.png"></div>
                <strong>Bacon King 3.0 Smokey</strong>
            </div>
            <div class="panino" data-index="3">
                <div><img src="immagini/parmigiano.png"></div>
                <strong>The Parmiggiano Reggiano Burger</strong>
            </div>
            <div class="panino" data-index="4">
                <div><img src="immagini/bacon.png"></div>
                <strong>Bacon King 3.0</strong>
            </div>
            <div class="panino" data-index="5">
                <div><img src="immagini/b.png"></div>
                <strong>Bacon King</strong>
            </div>
        </div>
    </div>

    <div id="cocktail">
        <div class="titolo">
            <span class="cocktail"></span>
            <strong>cocktail</strong>
        </div>
        <div class="lista" id="cocktail-lista"></div>
    </div>

    <div id="novità">
        <div class="barra1n">
            <strong>Novità</strong>
        </div>
        <div class="barra2n">
            <div class="novv">
                <div>
                    <img src="immagini/noviverde.jpg">
                    <strong>Novità-Plant Based</strong>
                </div>
            </div>
            <div class="novm">
                <div>
                    <img src="immagini/novmar.jpg">
                    <strong>Prova a vincere le Sneakers di Burger King!</strong><br>
                    <p>Registrati a"Be the King" e spendi almeno 10$: in palio 50 paia di sneakers Burger King</p>
                </div>
            </div>
        </div>
    </div>

    <div class="video-container">
        <div id="player1" class="video-player"></div>
        <div id="player2" class="video-player"></div>
    </div>

    <div id="luogo">
        <div>
            <img src="immagini/percorso.png">
        </div>
        <span class="parola">
            <h3>Vieni nel tuo regno da King</h3>
            <p>Trova il ristorante più vicino a te per venire a gustare subito i tuoi burger preferiti e vivere un'esperienza da vero king!</p>
            <div class="bottone" onclick="mostraMappa()">
                <p>Trova il regno</p>
            </div>
        </span>
        <span id="bordo">
            <img src="immagini/img_home_storelocator.png">
        </span>
    </div>

    <div id="mapContainer"></div>

    <footer id="finale">
        <div id="arancione"></div>
        <div id="rosso"></div>
        <div id="marrone">
            <span class="blocco1">
                <h2>FLAME GRILLS SINCE 1954</h2>
                <p>©2024 Burger King Restaurants Italia S.p.A. (società a socio unico) - All rights reserved.</p>
            </span>
            <span class="blocco2">
                <p>Modello D.lgs 231 e Codici Etici</p>
                <p>Cookie Policy</p>
                <p>Privacy Policy</p>
                <p>Terms and conditions</p>
            </span>
            <span class="blocco3">
                <p>Regolamenti</p>
                <p>Regolamento Premi BE THE KING</p>
            </span>
        </div>
    </footer>
</body>
</html>
