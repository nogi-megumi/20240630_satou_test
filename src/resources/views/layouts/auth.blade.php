<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    @yield('css')
    <title>管理画面</title>
</head>

<body>
    <header>
        <div class="header">
            <h1 class="header__title">FashionablyLate</h1>
            @yield('button')
        </div>
    </header>

    <main>
        <div class="content">
            @yield('content')
        </div>
    </main>
</body>

</html>