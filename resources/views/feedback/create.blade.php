@extends('layouts.app')

@section('title', 'Give Feedback')

@section('content')
    <h1>We'd love your feedback!</h1>

    <form action="/feedback/store" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="customer_name" value="{{ old('customer_name') }}">
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>

        <label>Message:</label>
        <textarea name="message">{{ old('message') }}</textarea>
        <br>

        <label>Rating (1-5):</label>
        <select name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>

        <button type="submit">Submit Feedback</button>
    </form>
@endsection