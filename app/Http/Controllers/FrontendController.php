<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;


class FrontendController extends Controller
{
    public function index(){
        $books = Book::orderBy('created_at', 'desc')->limit(30)->get();
        return view('frontend.index', [
            'books'=>$books,
        ]);
    }

}
