@extends('layouts.app')

@section('content')
    <h1>Notes</h1>
    <ul>
        @foreach ($notes as $note)
            <li>
                {{ $note->title }}
                — {{ $note->is_pinned ? 'Pinned' : 'Unpinned' }}
            </li>
        @endforeach
    </ul>
@endsection
