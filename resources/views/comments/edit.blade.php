@extends('layouts.master')

@section('content')


    <div class="col-sm-8 blog-main">


        <div class="blog-post">
            <h2 class="blog-post-title">
                {{ $comment->post->title }}
            </h2>
            <p class="blog-post-meta">
                by {{ $comment->post->user->name }}
                on {{ $comment->post->created_at->toDayDateTimeString() }}
            </p>

            {{ $comment->post->body }} <br>

            {{--@if($post->user->id == auth()->id())--}}
            {{--<a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>--}}
            {{--<a href="/posts/{{ $post->id }}/delete" class="btn btn-danger">Delete</a>--}}
            {{--@endif--}}
        </div><!-- /.blog-post -->


        <hr>

        <div class="comments">
            <ul class="list-group">
                @foreach($comment->post->comments as $comment)
                    <li class="list-group-item">
                        {{ $comment->body }}
                        <strong>
                            {{ $comment->created_at->diffForHumans() }}: &nbsp;
                        </strong>
                        {{--@if($comment->user->id == auth()->id())--}}
                        {{--<a href="/comments/{{ $comment->id }}/edit" class="btn btn-warning ml-auto">Edit</a>--}}
                        {{--<a href="/comments/{{ $comment->id }}/delete" class="btn btn-danger ml-auto">Delete</a>--}}
                        {{--@endif--}}
                    </li>
                @endforeach
            </ul>
        </div>

        <hr>

        <div class="card">
            <div class="card-bloc">
                <form method="post" action="/comments/update/{{$id}}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" id="" cols="30" rows="1" placeholder="Your comment here." class="form-control" autofocus>{{ \App\Comment::find($id)->body }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit comment</button>
                    </div>

                </form>

                @include('layouts.errors')
            </div>
        </div>

    </div><!-- /.blog-main -->
@endsection
