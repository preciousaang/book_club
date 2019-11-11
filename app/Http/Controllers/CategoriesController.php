<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|max:30|unique:categories', 
            'image'=>'required|image',
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

    public function edit(Request $request){
        $category = Category::findOrFail($request->id);
        return view('categories.edit', [
            'category'=>$category,
        ]);
    }

    public function update(Request $request){
        $category = Category::findOrFail($request->id);
        $request->validate([
            'title'=>['required','max:30',Rule::unique('categories')->ignore($request->id)],
            'image'=>'image',
            'description'=>'required',
        ]);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        if($request->hasFile('image')){
            Storage::delete('public/uploads/'.$category->image);
            $categoryImage = $request->file('image')->store('public/uploads');
            $category->image = basename($categoryImage);
        }
        $category->save();
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    public function delete(Request $request){
        $category = Category::findOrFail($request->id);
        Storage::delete('public/uploads/'.$category->image);
        $category->delete();
        return redirect()->route('list-categories')->with('message', 'Category Deleted Successfully');
    }
}
