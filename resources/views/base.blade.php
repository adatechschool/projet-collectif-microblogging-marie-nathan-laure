<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="http://127.0.0.1:5173/resources/css/app.css">
    <title>@yield('title')</title>
</head>
<body>
    {{ $slot }}
</body>
</html>