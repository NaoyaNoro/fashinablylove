<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLove</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>
</head>

<body>
    <div class="contact-header">
        <header class="contact-header__inner">
            <a href="/" class="contact-header__link">
                FashionablyLove
            </a>
        </header>
    </div>
    <main>
        @yield('content')
    </main>
</body>

</html>