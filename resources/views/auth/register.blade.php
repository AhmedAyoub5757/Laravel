@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <h1>Create an Account</h1>
    <form action="/register" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>

        <label>Password:</label>
        <input type="password" name="password">
        <br>

        <button type="submit">Register</button> 

    </form>


@endsection
