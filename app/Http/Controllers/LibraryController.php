<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function showBooks(){
        return "Showing all books in the library.";
    }

    public function showBook($id){
        return "Showing details for book with ID:" . $id;
    }

    public function searchTitle($title){
        return "Searching for books with title: " . $title;
    }

    public function checkAvailability($copies){
        if($copies > 0){
            return "The book is available.";
        } else {
            return "The book is not available.";
        }
    }
}
