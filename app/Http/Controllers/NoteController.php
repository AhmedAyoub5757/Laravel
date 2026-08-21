<?php

namespace App\Http\Controllers;

use App\Models\Note; 

class NoteController extends Controller
{
    public function store(){
        Note::create([
            'content' => 'New Note: Meeting at 5 PM Sharp!',
            'is_pinned' => true,
        ]);
        return "Note created successfully!";
    }

    public function index(){
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function show($id){
        $note = Note::findOne($id);
        return "Note Content:". $note->content;
    }

    public function togglePin($id){
        $note = Note::find($id);
        if ($note) {
            $note->is_pinned = !$note->is_pinned;
            $note->save();
            return "Note pin status toggled successfully!";
        } else {
            return "Note not found.";
        }
    }

    public function delete($id){
        $note = Note::find($id);
        return $note ? $note->delete() : "Note not found.";
    }
}
