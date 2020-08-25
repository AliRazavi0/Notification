<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('css')
</head>

<body>

    <ul>
        <li><a href="/login"> {{ __('public.login') }} </a></li>
        <li><a href="/">{{ __('public.home') }}</a></li>
    </ul>

    <div class="content">
        @yield('content')
    </div>

    @yield('javascript')
</body>

</html>
