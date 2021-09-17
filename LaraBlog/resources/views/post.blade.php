<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Post</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('blog/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('blog/css/blog-post.css') }}" rel="stylesheet">

</head>

<body>


  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Laravel Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
     <!-- <li class="nav-item"><a class="nav-link" href="">About</a></li>
          <li class="nav-item"><a class="nav-link" href="">Contact</a></li> -->
          <li class="nav-item"><a class="nav-link" href="/dashboard">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
      <h1 class="mt-4">{{ $article->title }}</h1>

        <!-- Author -->
      <p class="lead">by <a href="">{{ $article->author }}</a></p>

        <hr>

        <!-- Date/Time -->
      <p>Posted on: {{ date('d.m.Y', strtotime($article->created_at)) }} --- {{ $article->category->category_name }}</p>

        <hr>

        <!-- Preview Image -->
      <img class="img-fluid rounded" src="{{ asset('blog/images/blog.jpg') }}" alt="article picture">

        <hr>

        <!-- Post Content -->
        <p class="lead">
          {{ strip_tags($article->content) }}
        </p>

        

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="{{ route('comments.store') }}" method="POST">
              @csrf

            <input type="hidden" name="article_id" value="{{ $article->id }}">
              <div class="form-group">
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="3"></textarea>
                    @error('content')
                      <small class="form-text" style="color: red;">{{ $message }}</small>
                    @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->        
        @foreach ($comments as $comment)
        @if ($comment->article_id == $article->id)
            
          <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="./blog/images/user.jpg" alt="" style="height: 60px;">
          <div class="media-body">
          <h5 class="mt-0">{{ $comment->author }}</h5>
            {{ $comment->content }}
          </div>
        </div>
        @endif    
        @endforeach     
        
        <br />

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <form>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-append">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </form>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              @if (count($categories) > 0)
                  @foreach ($categories as $category)
                      
                 
              
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    @foreach ($category as $item)
       
                    <li><a href="{{ route('feed.showCategoryPosts', ['id'=>$item->id]) }}">{{ $item->category_name }}</a></li>
              
                  @endforeach
                </ul>
              </div>
               @endforeach
              @endif
            </div>
          </div>
        </div>


        <!-- Related Posts Widget -->
        <div class="card my-4">
          <h5 class="card-header">Related Posts</h5>
          <div class="card-body" style="padding-left: 0px;padding-right: 0px;">

            <div class="list-group list-group-flush">
              

              @foreach($related_articles as $item)
             
                  @if ($article->id != $item->id)
                  <a href="{{ route('articles.show', ['article'=>$item->id ]) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $item->title }}</h5>
                    </div>
                  <p class="mb-1">{{ substr(strip_tags($item->content), 0, 50) }}...</p>
                  <small class="text-muted">{{ date('d.m.Y', strtotime($item->created_at)) }}</small>
                  </a>
                  @endif

              @endforeach

            </div>

          </div>
        </div>

        <!-- Latest Posts Widget -->
        <div class="card my-4">
          <h5 class="card-header">Latest Posts</h5>
          <div class="card-body" style="padding-left: 0px;padding-right: 0px;">

            <div class="list-group list-group-flush">
              
              @foreach($latest_articles as $item)
             
                  @if ($article->id != $item->id)
                  <a href="{{ route('articles.show', ['article'=>$item->id ]) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $item->title }}</h5>
                    </div>
                  <p class="mb-1">{{ substr(strip_tags($item->content), 0, 50) }}...</p>
                  <small class="text-muted">{{ date('d.m.Y', strtotime($item->created_at)) }}</small>
                  </a>
                  @endif

              @endforeach
            </div>

          </div>
        </div>

        <!-- Subscribe Widget -->
        <div class="card my-4">
          <h5 class="card-header">Subscribe</h5>
          <div class="card-body">
            <form action="{{ route('subscribers.store') }}" method="POST">
              @csrf
              <div class="input-group">
                <input type="email" name="email" class="form-control  @error('email') 'is-invalid'  @enderror" placeholder="Submit your e-mail address" />
                <span class="input-group-append">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                  @error('email')
                  <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
                </span>
              </div>
            </form>
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="./blog/js/jquery/jquery.min.js"></script>
  <script src="./blog/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>