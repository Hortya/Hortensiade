<?php
session_start();

include 'includes/_config.php';
include 'includes/functions.php';
include 'includes/_database.php';
generateToken();
global $success;
global $errors;


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Hortensiade</title>
    <script type="module" src="http://localhost:5173/@vite/client"></script>
    <script type="module" src="http://localhost:5173/js/main.js"></script>
    <link rel="shortcut icon" href="../logo.ico" type="image/x-icon">
</head>

<body>
    <div class="body gradient">
        <header class="header">
            <h1 class="header__ttl">L'Hortensiade</h1>
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
            <div id="playGround">
            </div>
        </main>
        <footer>
            <a class="footer" href="">Mention légal</a>
            <input type="hidden" id="token" value="<?=$_SESSION['token']?>">
        </footer>
    </div>
    <template id="storyTemplate">
        <div id="playGroundContent">
            <p class="history" id="history">story</p>
            <div class="history__container" id="history-container">
            </div>
        </div>
    </template>
    <template id="buttonTemplate">
        <button type="button" class="history__btn js-btn" data-id="choice id">choice txt</button>
    </template>
    <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>