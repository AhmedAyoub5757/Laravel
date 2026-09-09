@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <h1>Login</h1>
    @if (session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif


    <form action="/login" method="POST">
        @csrf

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>

        <label>Password:</label>
        <input type="password" name="password">
        <br>

        <button type="submit">Login</button>
    </form>

@endsection
