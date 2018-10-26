<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('pages.welcome') }}">BLOG</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="{{ route('pages.welcome') }}">Home <span class="sr-only">(current)</span></a></li>
        <li class="{{ Request::is('/about') ? "active" : "" }}"><a href="{{ route('pages.about') }}">About Us</a></li>
        <li class="{{ Request::is('/contact') ? "active" : "" }}"><a href="{{ route('pages.contact') }}">Contact</a></li>
        <li><a href="{{ route('author.index') }}">Author</a></li>
        <li class="{{ Request::is('/admin') ? "active" : "" }}"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
        
      </ul>
                              {{--All about search query using algolia  --}}
      <form class="navbar-form navbar-left" action="/search" method="POST" role="search">
      {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="q">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
    
           @if (Auth::check()) 

            <li class="dropdown">
              <a href="/" class="dropdown-toggle btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('posts.index') }}">Posts</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li><a href="#">Tags</a></li>
                <li role="separator" class="divider"></li>
               <li><a href="{{ route('logout') }}">Log Out</a></li>  
         
              </ul>
            </li>
          
          @else
              <li><a href="/register">Register</a></li>
              <li><a href="/login">Login</a></li>
          @endif

          </ul> 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>