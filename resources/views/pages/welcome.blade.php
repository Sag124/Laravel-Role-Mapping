@extends('main')

@section('title', '| HomePage')

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1 class="h1-sp">Welcome to My Blog!</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
          </div>
        </div>
      </div>
      <!-- end of header .row -->

  <div class="row">
        <div class="col-md-7">
          
          @foreach ($posts as $post)

          <div class="post">
            <h3>{{ $post->title }}</h3>
            <p>{{ substr(strip_tags($post->body), 0,50) }}{{ strlen(strip_tags($post->body))>50 ? "..." : "" }}</p>
            <a href="blog/{{ $post->slug }}" class="btn btn-primary">Read More</a>
          </div>
          <hr>
          @endforeach

        </div>

        <div class="col-md-4">
          <h2 class="text-center">Current Updates!</h2>          
          
          <div class="list-group">
          <marquee behavior="scroll" direction="up" bgcolor="white" height="200px">
          <a href="#" class="list-group-item list-group-item-success">Recently 200 members registered in our website</a>
          <a href="#" class="list-group-item list-group-item-info">Blog posts are increasing day by day!</a>
          <a href="#" class="list-group-item list-group-item-warning">Blog post user interface has been modified</a>
          <a href="#" class="list-group-item list-group-item-danger">Please log in to view your updates</a>
          </marquee>
          </div>
          
      <div class="row">
        <div class="col-md-2 col-md-offset-2">
           <blockquote>Time is precious Dont waste it.
          <footer>So Keep Posting!</footer>
          </blockquote>
        </div>
        </div>
      </div>
      </div>
@endsection