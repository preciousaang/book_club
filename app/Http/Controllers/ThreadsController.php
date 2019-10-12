<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ThreadsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['list', 'view']);
    }

    public function list(){
        $threads = Thread::paginate(30);
        return view('threads.list', [
            'threads'=>$threads,
        ]);
    }

    public function create(){
        return view('threads.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|max:120',
            'body'=>'required'
        ]);
        $newThread = Thread::create([
            'title'=>$request->input('title'),
            'user_id'=>auth()->user()->id
        ]);
        $newThread->posts()->create([
            'user_id'=>auth()->user()->id,
            'content'=>$request->input('body')
        ]);
        return redirect()->back()->with('success', 'Thread Created Successfully!');
    }

    public function view(Request $request){
        $thread = Thread::where('slug', $request->slug)->firstOrFail();
        return view('threads.view',[
            'thread'=>$thread,
        ]);
    }

    public function add_post(Request $request){
               
        $thread = Thread::findOrFail($request->id);
        return view('posts.create', [
            'thread'=>$thread
        ]);

    }

    public function reply(Request $request){
        $request->validate([
            'body'=>'required'
        ]);
        $thread = Thread::findOrFail($request->id);
        $thread->posts()->create([
            'user_id'=>auth()->user()->id,
            'content'=>$request->input('body')
        ]);
        return redirect()->route('view-thread', $thread->slug)->with('success', 'Replied Successfully!');
    }
}
