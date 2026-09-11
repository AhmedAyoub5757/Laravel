<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('styles')
</head>
<body class="@yield('body-class')">
    <nav>
        <h1>School System</h1>
        @if (request()->routeIs('recipes.*'))
            <a href="{{ route('recipes.index') }}">Recipes</a>
        @endif
        @if(Auth::check())
        <form action='/logout' method='POST'>
            @csrf
            <button type='submit'>Logout</button>
        </form>
        @else
        <a href='/login'>Login</a>
        <a href='/register'>Register</a>
        @endif
    </nav>
    @yield('content')
</body>
</html>