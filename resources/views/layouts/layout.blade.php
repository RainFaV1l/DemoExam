<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Exam</title>
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <script src="{{ asset('public/js/script.js') }}"></script>
</head>
<body>
    <main>
        @yield('content')
    </main>
</body>
</html>
