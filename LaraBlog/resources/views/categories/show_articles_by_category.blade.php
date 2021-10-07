<!DOCTYPE html>
<html lang="en">

<head>
    <title>Articles for category "{{ $category->category_name }}"</title>
    
    @include('shared.meta_header')

</head>

<body>

<!-- Navigation menu -->
@include('shared.navmenu')

 <!-- Admin header -->
@include('shared.admin_header')


     <!-- [ Main Content ] start -->
     <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                        <h5>Articles for category "{{ $category->category_name }}"</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Article</th>
                                                            <th>Comments</th>
                                                            <th>Visits</th>
                                                            <th>Category</th>
                                                            <th>Author</th>
                                                            <th>Created At</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if (count($articles) > 0)
                                                        @foreach ($articles as $article)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        <div class="media-body">
                                                            <h6 class="d-inline-block">{{ $article->title }}</h6>
                                                            <p class="m-b-0 text-muted">{{ substr(strip_tags($article->content), 0, 100) }}...</p>
                                                        </div>
                                                    </td>
                                                    <td><a href="{{ route('comments.article_comments', ['id'=>$article->id]) }}">{{ $article->comments()->count() }}</a></td>
                                                    <td>{{ $article->views }}</td>
                                                <td><a href="{{ route('categories.showArticlesByCategory', ['id'=>$article->category_id]) }}">{{ $article->category->category_name }}</a></td>
                                                    <td>{{ $article->author }}</td>
                                                    <td><h6 class="text-muted">{{ date('d.m.Y', strtotime($article->created_at)) }}</h6></td>
                                                    <td>
                                                        <a href="{{ route('articles.show', ['article'=>$article->id ]) }}" target="_blank"><i class="fas fa-eye f-20 text-c-blue"></i></a> &nbsp; &nbsp;
                                                        <a href="{{ route('articles.edit', ['article'=>$article->id ]) }}"><i class="fas fa-pencil-alt f-20 text-c-yellow"></i></a> &nbsp; &nbsp;
                                                        <a onclick="event.preventDefault(); document.getElementById('article-delete-{{ $article->id }}').submit();"href="{{ route('articles.destroy', ['article'=>$article->id ]) }}"><i class="fas fa-times f-20 text-c-red"></i></a>
                                                        <form action="{{ route('articles.destroy', ['article'=>$article->id ]) }}" method="POST" id="article-delete-{{ $article->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                                        @endforeach
                                                         
                                                    @else
                                                        <tr>
                                                            <td colspan="8">There is no any article</td>
                                                        </tr>
                                                    @endif
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    @include('shared.scripts')

</body>

</html>
