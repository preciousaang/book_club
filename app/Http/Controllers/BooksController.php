<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class BooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['list', 'view', 'search']);
    }
    public function create(){
        return view('books.create', [
            'categories' => Category::orderBy('title', 'asc')->get(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'category_id'=>'required|integer|exists:categories,id',
            'author'=>'required',
            'cover_image'=>'required|image',
            'purchase_link'=>'required|url'
        ]);
        //Image Upload
        $cover_image = $request->file('cover_image')->store('public/uploads');
        $newBook = Book::create([
            'title'=>$request->input('title'),
            'category_id'=>$request->input('category_id'),
            'author'=>$request->input('author'),
            'cover_image'=>basename($cover_image),
            'purchase_link'=>$request->input('purchase_link')
        ]);

        if($newBook){
            return redirect()->route('list-books');
        }
    }

    public function list(){
        $books = Book::paginate(20);
        return view('books.list', [
            'books'=>$books,
        ]);
    }

    public function view(Request $request){
        $book = Book::whereSlug($request->slug)->firstOrFail();
        
        return view('books.view', [
            'book'=>$book,
            'avg_rating'=> round($book->reviews()->avg('rating'), 1),
        ]);
    }

    public function edit(Request $request){
        $book = Book::findOrFail($request->id);
        return view('books.edit', [
            'book'=>$book,
            'categories'=>Category::orderBy('title', 'asc')->get()
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'title'=>'required',
            'category_id'=>'required|integer|exists:categories,id',
            'author'=>'required',            
            'purchase_link'=>'required|url'
        ]);        
        $book = Book::findOrFail($request->id);
        $book->title = $request->input('title');
        $book->category_id = $request->input('category_id');
        $book->author = $request->input('author');
        $book->purchase_link = $request->input('purchase_link');
        $book->save();
        return redirect()->route('view-book', $book->slug)->with('success', 'Book Updated Successfully');
    }

    public function add_review(Request $request){
        $request->validate([            
            'body'=>'required',
            'rating'=>'required|numeric|min:1|max:10',
        ]);
        $book = Book::find($request->id);
        $book->reviews()->create([
            'body'=> $request->input('body'),
            'rating'=>$request->input('rating'),
            'user_id'=>auth()->user()->id,
        ]);
        return redirect()->back()->with('success', 'Review Added Successfully!');
    }

    public function search(Request $request){
        $request->validate([
            'search'=>'required'
        ]);
        $books = Book::where('title', 'like', '%'.$request->input('search').'%')->paginate(20);

        return view('books.list', [
            'books'=>$books,
        ]);
    }
}
