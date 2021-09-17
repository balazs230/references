<!DOCTYPE html>
<html lang="en">

<head>
    <title>Comments by Articles</title>
    
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
                                            @foreach ($comments as $comment)
                                            @if ($loop->iteration < 2)
                                        <h5>Comments for article {{ $comment->article->title }}</h5>
                                            @endif
                                            
                                            @endforeach
                                        
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Comment</th>
                                                            <th>Author</th>
                                                            <th>Created At</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($comments) > 0)
                                                                @foreach ($comments as $comment)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td> {{ $comment->content }}</td>
                                                            <td>{{ $comment->author }}</td>
                                
                                                            <td>{{ $comment->created_at }}</td>
                                                            <td>
                                                               <a onclick="event.preventDefault(); document.getElementById('comment-delete-{{ $comment->id }}').submit();"href="{{ route('comments.destroy', ['comment'=>$comment->id ]) }}"><i class="fas fa-times f-20 text-c-red"></i></a>
                                                                <form action="{{ route('comments.destroy', ['comment'=>$comment->id ]) }}" method="POST" id="comment-delete-{{ $comment->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </td>
                                                        </tr>
                                                                @endforeach
                                                                 
                                                            @else
                                                                <tr>
                                                                    <td colspan="8">There is no comment</td>
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
