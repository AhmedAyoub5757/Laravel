@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <h1>Task List</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task->title }}
                — {{ $task->is_done ? 'Done' : 'Pending' }}
            </li>
        @endforeach
    </ul>
@endsection