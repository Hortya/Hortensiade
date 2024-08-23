<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Hortensiade</title>
    @vite('resources/scss/style.scss')
    <link rel="shortcut icon" href="../logo.ico" type="image/x-icon">
</head>

<body>
    <div class="body gradient">
        <header class="header">
            <h1 class="header__ttl">L'Hortensiade</h1>
            <nav class="header__lst-container" aria-label="navigation principal" id="header-nav">
                <ul class="header__lst" id="header-list">
                    <li class="header__itm" id="logo">
                        <a href="{{route('index')}}">
                            <img class="header__logo" src="./image/logo.svg" alt="logo L'Hortensiade">
                        </a>
                    </li>
                    <div class="header__itm-container" id="burger-container">
                        <li class="menu-burger" id="menu-burger"></li>
                        <x-header-menu />
                    </div>
                </ul>
            </nav>
        </header>
        <main>
            <div id="playGround" class="history__container">
                <p class="history" id="history">{{$bt[0]->text}}</p>
                @foreach($c as $choice)
                <form action="{{route('unroll')}}" method="post" class="history__container-btn">
                    @CSRF
                    <input type="hidden" name="id" value="{{$choice->leads_to}}">
                    <button type="submit" class="history__btn js-btn">{{$choice->text}}</button>
                </form>
                @endforeach
            </div>
        </main>
        <footer>
            <a class="footer" href="">Mention légal</a>
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
    @vite('resources/js/script.js')
</body>

</html>