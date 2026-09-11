<!DOCTYPE html>
<html>
<head><title>@yield('title')</title></head>
<body>
    <nav>
        <h1>School System</h1>
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