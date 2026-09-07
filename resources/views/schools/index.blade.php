@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <h1>School List</h1>
    <ul>
        @foreach ($schools as $school)
            <li>
                {{ $school->name }} — {{ $school->address }}
                
            </li>
        @endforeach
    </ul>
@endsection