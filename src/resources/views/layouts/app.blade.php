<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
    <title>お問い合わせフォーム</title>
</head>

<body>
    <header>
        <h1 class="header__title">FashionablyLate</h1>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>