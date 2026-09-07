@extends('layouts.app')

@section('title', 'Courses')

@section('content')
    <h1>Course List</h1>
    <ul>
        @foreach ($courses as $course)
            <li>
                <strong>{{ $course->code }}</strong> — {{ $course->title }}
                ({{ $course->credit_hours }} credit hours)
                — Instructor: {{ $course->instructor }}
                — {{ $course->is_active ? 'Active' : 'Inactive' }}
                — <a href="/courses/{{ $course->id }}">View</a>
            </li>
        @endforeach
    </ul>
@endsection