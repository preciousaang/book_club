<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|max:30|unique:categories', 
            'image'=>'image', 
            'description'=>'required',
        ]);

        $categoryImage = $request->file('image')->store('public/uploads');
        $newCategory = Category::create([
            'title'=>$request->input('title'), 
            'image'=>basename($categoryImage), 
            'description'=>$request->input('description')
        ]);
        return redirect()->route('list-categories')->with('success', 'Category Created Successfully');
    }

    public function list(){
        $categories = Category::orderBy('title', 'asc')->withCount('books')->paginate(20);
        
        return view('categories.list', [
            'categories'=>$categories,
        ]);
    }

    public function list_books(Request $request){
        $category = Category::findOrFail($request->id);
        $books = $category->books()->orderBy('created_at', 'desc')->paginate(20);
        return view('books.list', [
            'books'=>$books,
            'category'=>$category
        ]);
    }
}
