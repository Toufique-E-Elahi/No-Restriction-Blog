{{--<!DOCTYPE HTML>--}}
{{--<!----}}
{{--	Projection by TEMPLATED--}}
{{--	templated.co @templatedco--}}
{{--	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)--}}
{{---->--}}


{{--<html>--}}
{{--<head>--}}
{{--    <title>Projection by TEMPLATED</title>--}}
{{--    <meta charset="utf-8" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1" />--}}
{{--    <link rel="stylesheet" href="css/main.css" />--}}
{{--</head>--}}
{{--<body>--}}
{{--@yield('content')--}}

{{--</body>--}}
{{--</html>--}}
    <!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="/css/default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />

    @yield('head')

</head>
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1><a href="/">NO RESTRICTION</a></h1>
        </div>
        <div id="menu">
            <ul>
{{--            <li class="{{Request::path() === 'new' ? 'current_page_item' : ''}}"><a href="/new" accesskey="1" title="">Homepage</a></li>--}}
                <li class="{{Request::path() === 'clients' ? 'current_page_item' : ''}}"><a href="/" accesskey="2" title="">Our Clients</a></li>
                <li class="{{Request::is('about') ? 'current_page_item' : ''}}"><a href="/about" accesskey="3" title="">About Us</a></li>
                <li class="{{Request::path() === 'articles' ? 'current_page_item' : ''}}"><a href="/articles" accesskey="4" title="">Articles</a></li>
{{--            <li class="{{Request::path() === 'contact' ? 'current_page_item' : ''}}"><a href="/contact" accesskey="5" title="">Contact Us</a></li>--}}
                @if (Route::has('login'))

                        @auth

                            <li class="{{Request::path() === 'articles/create' ? 'current_page_item' : ''}}"><a href="/articles/create" accesskey="6" title="">Add Article</a></li>
                            <li class="{{Request::path() === 'userArticles' ? 'current_page_item' : ''}}"><a href="/userArticles" accesskey="6" title="">My articles</a></li>
                            <li class="{{Request::path() === '' ? 'current_page_item' : ''}}"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" accesskey="6" title="">
                                Log Out </a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        @else

                            <li class="{{Request::path() === '/login' ? 'current_page_item' : ''}}"><a href="/login" accesskey="7" title="">Login</a></li>
                            @if (Route::has('register'))
                                <li class="{{Request::path() === '/register' ? 'current_page_item' : ''}}"><a href="/register" accesskey="8" title="">Register</a></li>
                            @endif
                        @endif

                @endif
            </ul>
        </div>
    </div>
    @yield('header-featured')

</div>
@yield('content')
<div id="copyright" class="container">
    <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>

