<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
    <title>FashinablyLate</title>
    @livewireStyles
</head>


<body>
    <div class="contact-header">
        <a href="/" class="contact-header__link">
            <h1>FashionablyLove</h1>
        </a>
        @yield('button')
    </div>
    <main>
        @yield('content')
    </main>
    @livewireScripts
</body>