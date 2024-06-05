<?php

require_once 'auth.php';
if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}
$userid = $_SESSION['_agora_user_id'];

include 'config.php';

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$check_user_query = "SELECT * FROM users WHERE id = ?";
$stmt_check_user = $conn->prepare($check_user_query);
$stmt_check_user->bind_param("i", $userid);
$stmt_check_user->execute();
$user_result = $stmt_check_user->get_result();

if ($user_result->num_rows === 0) {
    header("Location: login.php");
    exit;
}

$query = "SELECT id, nome, immagine, prezzo FROM prodotti WHERE idutente = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();

$prodotti = [];
$totalCost = 0; 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prodotti[] = $row;
        $totalCost += $row['prezzo']; 
    }
}

$stmt->close();
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <link rel="stylesheet" href="carrello.css">
    <script src="carrello.js" defer></script>
</head>
<body>
<header id="header" data-userid="<?php echo htmlspecialchars($userid); ?>">
    <nav id="nav-menu" class="hidden">
        <a href='home.php'>torna indietro</a>
    </nav>
</header>

<div class="carrello">
    <h1>Il tuo carrello</h1>
    <?php if (!empty($prodotti)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Immagine</th>
                    <th>Prezzo</th>
                    <th>Azione</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prodotti as $prodotto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($prodotto['nome']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($prodotto['immagine']); ?>" alt="<?php echo htmlspecialchars($prodotto['nome']); ?>" width="100"></td>
                        <td><?php echo htmlspecialchars($prodotto['prezzo']); ?> €</td>
                        <td><button onclick="rimuoviProdotto(<?php echo htmlspecialchars($prodotto['id']); ?>)">Rimuovi</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Totale: <?php echo htmlspecialchars($totalCost); ?> €</h2> 
    <?php else: ?>
        <p>Il carrello è vuoto.</p>
    <?php endif; ?>
</div>

</body>
</html>
