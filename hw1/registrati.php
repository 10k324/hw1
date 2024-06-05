<?php
    require_once 'auth.php';

    if (checkAuth()) {
        header("Location: home.php");
        exit;
    }   

    $error = array();

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && 
        !empty($_POST["surname"]) && !empty($_POST["confirm_password"]) && !empty($_POST["allow"]))
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error['username'] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error['username'] = "Username già utilizzato";
            }
        }

        if (strlen($_POST["password"]) < 8) {
            $error['password'] = "Caratteri password insufficienti";
        } 

        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error['confirm_password'] = "Le password non coincidono";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error['email'] = "Email già utilizzata";
            }
        }

        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["_agora_username"] = $_POST["username"];
                $_SESSION["_agora_user_id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else {
                $error['general'] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $error['general'] = "Riempi tutti i campi";
    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="registrati.css">
    <script src='registrati.js' defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <style>
        .errorj { color: red; }
    </style>
</head>
<body>
    <main>
        <section class="main_left"></section>
        <section class="main_right">
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class="names">
                    <div class="name">
                        <label for='name'>Nome</label>
                        <input type='text' id='name' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> >
                        <div class='error'></div>
                    </div>
                    <div class="surname">
                        <label for='surname'>Cognome</label>
                        <input type='text' id='surname' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> >
                        <div class='error'></div>
                    </div>
                </div>
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' id='username' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?> >
                    <div class='error'></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' id='email' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?> >
                    <div class='error'></div>
                </div>
                <div class="password">
                    <label for='password'>Password (inserire 8 caratteri)</label>
                    <input type='password' id='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?> >
                    <div class='error'></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' id='confirm_password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?> >
                    <div class='error'></div>
                </div>
                <div class="allow">
                    <label for='allow'>Accetto i termini e condizioni d'uso.</label>
                    <input type='checkbox' id='allow' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>>
                </div>
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
                <div class='error general'></div>
            </form>
            <div class="signup">Hai un account? <a href="login.php">Accedi</a></div>
        </section>
    </main>
</body>
</html>
