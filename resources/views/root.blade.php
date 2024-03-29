<!doctype html>
<html lang="en" dir="rtl" data-bs-theme="@if(auth()->check())
{{auth()->user()->dark_mode ? 'dark' : 'light'}}@endif">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>
        @yield('title')
    </title>
</head>
<body>
@yield('body')
</body>
</html>
