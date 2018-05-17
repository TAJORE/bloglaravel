<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Post;


class PostsController extends Controller
{
    public function index(){

        return view('posts.index');
    }

    public function show(){

        return view('posts.show');
    }

    public function create(){

        return view('posts.create');
    }


    public function store(){

        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required',
        ]);

        Post::create(request(['title','body']));

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