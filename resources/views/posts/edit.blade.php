@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

        <h1> Edit a post </h1>

        <hr>

        <form method="post" action="/posts/update/{{$id}} ">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="3" class="form-control" >{{$post->body}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save change</button>
            </div>



        </form>


        @include('layouts.errors')





    </div>

@endsection

