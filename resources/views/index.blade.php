<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Hortensiade</title>
    <link rel="shortcut icon" type="image/x-icon" href="logo.ico">
    @vite('resources/scss/style.scss')
</head>

<body>
    <div class="body gradient">
        <header class="header">
            <h1 class="header__ttl">L'Hortensiade</h1>
            <nav class="header__lst-container" aria-label="navigation principal" id="header-nav">
                <ul class="header__lst" id="header-list">
                    <li class="header__itm" id="logo"><img class="header__logo" src="./image/logo.svg"
                            alt="logo L'Hortensiade"></li>
                    <div class="header__itm-container" id="burger-container">
                        <li class="menu-burger" id="menu-burger"></li>
                        <x-header-menu />
                    </div>
                </ul>
            </nav>
        </header>
        <main>
            <h2 class="ttl">L’hortensiade est un site dont vous êtes l’héroïne.
                Serez-vous prêt.e.s à relever les défis et anihiler les opressions ?</h2>
            <nav aria-label="navigation de jeu">
                <ul class="btn">
                    <li class="btn__container"><a class="btn__itm" href="{{@route('game')}}">jouer</a></li>
                    <li class="btn__container"><a class="btn__itm btn__itm--grass" href="php/create.php">créer son histoire</a></li>
                </ul>
            </nav>
        </main>
        <footer>
            <a class="footer" href="">Mention légal</a>
        </footer>
    </div>
    @vite('resources/js/script.js')
</body>

</html>