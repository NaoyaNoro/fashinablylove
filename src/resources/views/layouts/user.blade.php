<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    @yield('css')
    <title>FashinablyLate</title>
    @livewireStyles
</head>


<body>
    <div class="contact-header">
        <a href="/" class="contact-header__link">
            FashionablyLove
        </a>
        @if(Auth::check())
        <form class="form" action="/logout" method="post">
            @csrf
            <button class="header-nav__button">Logout</button>
        </form>
        @endif
        <form class="form" action="/login" method="post">
            @csrf
            <button class="header-nav__button">Login</button>
        </form>
    </div>
    <main>
        @yield('content')
    </main>
    @livewireScripts
</body>

</html>