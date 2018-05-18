@extends('layouts.master')



@section('content')

        <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<!-- Custom styles for this template -->
<link href="css/blog.css" rel="stylesheet">
<body>
<div class="container">
    <div class="row">

        <div class="col-sm-8 blog-main">
            @foreach ($posts as $post)

                @include ('posts.post')

            @endforeach
            <nav>
                <ul class="pager">
                    <li><a href="#">Previous</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </nav>

        </div><!-- /.blog-main -->


    </div><!-- /.row -->

</div><!-- /.container -->

</body>
@endsection


@section('footer')

    <script src="/js/file.js"></script>
@endsection