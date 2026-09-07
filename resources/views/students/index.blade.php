@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <h1>Student List</h1>
    <ul>
        @foreach ($students as $student)
            <li>
                {{ $student->name }} — Class {{ $student->class_name }}
                — {{ $student->is_enrolled ? 'Enrolled' : 'Not Enrolled' }}
            </li>
        @endforeach
    </ul>
@endsection