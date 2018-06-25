<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index(){

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        //$posts = Post::latest();

        //if($month = request('month')){
         //   $posts->whereMonth('create_at', Carbon::parse($month)->month);
        //}

        //if($year = request('year')){
       //     $posts->whereYear('create_at', $year);
        //}

        //$posts = $posts->get();

       $archives = Post::selectRaw('YEAR(created_at) YEAR, monthname(created_at) month, COUNT(*) published')
           ->groupBy('year','month')
           ->orderByRaw('min(created_at) desc')
           ->get()
           ->toArray();

        return view('posts.index',compact('posts', 'archives'));
    }

    public function show(Post $post){

        return view('posts.show', compact('post', 'archives'));
    }

    public function create(){

        return view('posts.create');
    }


    public function store(){

        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required',
        ]);

        auth()->user()->publish(

        new Post(request(['title','body']))
        );


        return redirect('/');
    }

    public function edit($id)
    {
        $post = \App\Post::find($id);
        return view('posts.edit', compact('post', 'id'));
    }

    public function update(Request $request, $id)
    {
        //
        $post= \App\Post::find($id);
        $post->title=$request->get('title');
        $post->body=$request->get('body');
        $post->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        //
        $post = \App\Post::find($id);
        $post->delete();
        session()->flash(
            'message', 'Post has been  deleted'
        );
        return redirect('/');
    }
}
class TestController extends Controller
{
    public function requestTest(Request $request)
    {
        dd($request->all());
    }
}