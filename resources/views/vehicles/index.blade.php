@extends('layouts.app')

@section('title', 'Vehicle List')

@section('content')
    <h1>Vehicle List</h1>
    <ul>
        @foreach ($vehicles as $vehicle)
            <li>{{ $vehicle }}</li>
        @endforeach
    </ul>
@endsection