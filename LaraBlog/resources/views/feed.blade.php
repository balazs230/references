<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Blog Home</title>

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
          <li class="nav-item"><a class="nav-link" href="">About</a></li>
          <li class="nav-item"><a class="nav-link" href="">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="/dashboard">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">TechAdviser News <small>- the best articles ever</small></h1>

        <!-- Blog Post -->
    
        @foreach ($articles as $article)
            <div class="card mb-4">
          <img class="card-img-top" src="./blog/images/blog.jpg" alt="Card image cap" />
          <div class="card-body">
          <h2 class="card-title">{{ $article->title }}</h2>
            <p class="card-text">{{ substr(strip_tags($article->content), 0, 150) }}...</p>
            <a href="{{ route('articles.show', ['article'=>$article->id ]) }}" class="btn btn-primary">Read More &rarr;</a>
          </div>
        <div class="card-footer text-muted">Posted on {{ date('M d, Y', strtotime($article->created_at)) }} by <a href="">{{ $article->author }}</a></div>
        </div>
        @endforeach

        

        <br />

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
          <div class="pagination justify-content-center">
            {{ $articles->links() }}
          </div>
        </nav>

        <br />

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
              <form action="{{ route('search') }}" method="GET">
                  <div class="input-group">
                      <input type="text" class="form-control" name="search" placeholder="Search for..." />
                      <span class="input-group-append">
                          <button class="btn btn-secondary" type="submit">Go!</button>
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

        <!-- Popular Posts Widget -->
        <div class="card my-4">
          <h5 class="card-header">Popular Posts</h5>
          <div class="card-body" style="padding-left: 0px;padding-right: 0px;">

            <div class="list-group list-group-flush">
              

             @foreach($popular_articles as $item)
             
                 
                  <a href="{{ route('articles.show', ['article'=>$item->id ]) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $item->title }}</h5>
                    </div>
                  <p class="mb-1">{{ substr(strip_tags($item->content), 0, 50) }}...</p>
                  <small class="text-muted">{{ date('d.m.Y.', strtotime($item->created_at)) }}</small>
                  </a>
                 

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
                  
                </span>
              </div>
              @error('email')
                 <small class="form-text" style="color: red;">{{ $message  }}</small> 
                 @enderror
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
  <script src="{{ asset('blog/js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('blog/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>