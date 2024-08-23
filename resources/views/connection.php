<?php 
session_start();

include 'includes/_config.php';
include 'includes/functions.php';
include 'includes/_database.php';

global $success;
global $errors;

generateToken();


if(!isset($_REQUEST['action'])){
    redirectTo('../index.php');
}
elseif($_REQUEST['action'] === 'logIn'){
    $ttl = 'Se connecter';
}
elseif($_REQUEST['action'] === 'signUp'){
    $ttl = 'S\'inscrire';
}
else{
    header('location: index.php?error=impossible d\'acceder à la page de connection');
}
?>

<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>L'Hortensiade</title>
        <link rel="shortcut icon" type="image/x-icon" href="../logo.ico">
        <script type="module" src="http://localhost:5173/@vite/client"></script>
    <script type="module" src="http://localhost:5173/js/main.js"></script>
</head>

<body>
    <div class="body gradient">
        <header class="header">
            <h1 class="header__ttl">L'Hortensiade</h1>
            <h2 class="header__ttl header__ttl--second"><?= $ttl?></h2>
            <nav class="header__lst-container" aria-label="navigation principal" id="header-nav">
                <ul class="header__lst" id="header-list">
                    <li class="header__itm" id="logo">
                        <a href="../index.php">
                            <img class="header__logo" src="../assets/img/logo.svg" alt="logo L'Hortensiade"></a>
                    </li>
                    <div class="header__itm-container" id="burger-container">
                        <li class="menu-burger" id="menu-burger"></li>
                        <?= headerMenu('') ?>
                    </div>
                </ul>
            </nav>
        </header>
        <main>
            <form class="connection js-connection" method="post" action="api.php">
                <input type="hidden" name="action" id='action' value="<?= $_REQUEST['action'] ?>">
                <input type="hidden" name="token" id='token' value="<?= $_SESSION['token'] ?>">
                <label class="connection__label" for="id">Votre nom d'utilsateur</label>
                <input class="connection__input" type="text" name="id" id="id">
                <label class="connection__label" for="password">Votre mot de passe</label>
                <input class="connection__input" type="password" name="password" id="password">
                <button class="connection__btn js-send" type="submit"><?= $ttl?></button>
            </form>
        </main>
        <footer>
            <a class="footer" href="">Mention légal</a>
        </footer>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>