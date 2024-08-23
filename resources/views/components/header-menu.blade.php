@if(!Auth::user())
<li class="header__itm menu-burger__itm js-menu-burger" id="header-conect">
        <a href="{{route('login')}}">Se connecter</a>
</li>
<li class="header__itm menu-burger__itm js-menu-burger" id="header-register">
        <a href="{{route('register')}}">S'inscrire</a>
</li>
@else
<li class="header__itm menu-burger__itm js-menu-burger" id="header-deco">
        <form action="{{route('logout')}}" method="post">
                @csrf
                <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Se déconnecter</a>
        </form>
</li>
<li class="header__itm menu-burger__itm js-menu-burger" id="header-account">
        <a href="{{route('dashboard')}}">Modifier son compte</a>
</li>
@endif