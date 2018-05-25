<!doctype html>
<html lang="en">
<head>


    <title>Album example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/app.scss" rel="stylesheet">
</head>

<body>


@include('layouts.nav')
<div class="blog-header">
    <div class="container">
       <h1 class="blog-title"> the bootstrap Blog</h1>
        <p class="lead blog-description"> An example template built with bootstrap</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8">@yield('content')</div>
        <div class="col-sm-4">@include('layouts.sidebar')</div>
    </div>
</div>



@include('layouts.footer')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js//jquery-slim.min.js"><\/script>')</script>
<script src="js/vendor/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/holder.min.js"></script>
</body>
</html>
