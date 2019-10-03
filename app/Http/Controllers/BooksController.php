<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function __construct(){
        //$this->middlewar`e('auth');
    }
    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $newBook = Book::create([
            
        ]);
    }
}
