<nav>
    <ul class="nav nav-pills pull-right">
        <li role="presentation" {{ (Request::is('/') ? ' class=active' : '') }}><a href="{{URL::to('/')}}">Home</a></li>
        <li role="presentation" {{ (Request::is('play') ? ' class=active' : '') }}><a href="{{URL::to('/play')}}">Play</a></li>
    </ul>
</nav>