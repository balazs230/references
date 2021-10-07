<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    
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
                                <!-- [ posts section ] start -->
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-file-text f-36 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                <h3 class="f-w-300">{{ count($articles) }}</h3>
                                                    <span class="d-block text-uppercase">ARTICLES</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ posts section ] end -->

                                <!-- [ categories section ] start -->
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-layers f-36 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">{{ count($categories) }}</h3>
                                                    <span class="d-block text-uppercase">CATEGORIES</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ categories section ] end -->

                                <!-- [ subscribers section ] start -->
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-mail f-36 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">{{ count($subscribers) }}</h3>
                                                    <span class="d-block text-uppercase">SUBSCRIBERS</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ subscribers section ] end -->

                                <!-- [ users section ] start -->
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-eye f-36 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                <h3 class="f-w-300">{{ $articles->sum('views') }}</h3>
                                                    <span class="d-block text-uppercase">ARTICLES VISITS</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ users section ] end -->

                                <!-- [ worldLow section ] start -->
                                <div class="col-xl-8 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Recent Comments</h5>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                
                                                <table class="table table-hover">
                                                    <tbody>
                                                @if (count($comments) > 0)
                                                  @foreach ($comments as $comment)
                                                    <tr class="unread">
                                                        <td><img class="rounded" style="width:40px;" src="./blog/images/user.jpg" alt="activity-user"></td>
                                                            <td>
                                                            <h6 class="mb-1">{{ $comment->author }}</h6>
                                                            <p class="m-0">{{ substr($comment->content, 0, 50) }}...</p>
                                                            </td>
                                                            <td><h6 class="text-muted">{{ date('d M @ H:m', strtotime($comment->created_at)) }}</h6></td>
                                                            <td><a href="{{ route('comments.article_comments', ['id'=>$comment->article->id]) }}">{{ $comment->article->title }}</a></td>
                                                          <td><form action="{{ route('comments.destroy', ['comment'=>$comment->id ]) }}" method="POST" id="comment-delete-{{ $comment->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                        </form> </td>
                                                    </tr>
                                                @endforeach  
                                                @else
                                                    <tr colspan="5">No comment...</tr>
                                                @endif
                                                


                                                    </tbody>

                                            
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ worldLow section ] end -->

                                <!-- [ statistics year chart ] start -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Articles</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-sm-6 text-center m-b-20">
                                                    <h6 class="pb-4 d-block">WITH COMMENTS</h6>
                                                    <div class="happyball"></div>
                                                    <h3 class="font-weight-light mt-2">55%</h3>
                                                    <span class="b-block pt-2">{{ count($articles) }} Articles</span>
                                                </div>
                                                <div class="col-sm-6 text-center m-b-20">
                                                    <h6 class="pb-4 d-block">WITHOUT COMMENTS</h6>
                                                    <div class="sadball"></div>
                                                <h3 class="font-weight-light mt-2">45%</h3>
                                                    <span class="b-block pt-2">{{ count($articles) }} Articles</span>
                                                </div>
                                                <div class="col-sm-12">
                                                    <a class="btn btn-primary shadow-2 text-uppercase btn-block mt-3 mr-0" href="/comments">view all comments</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ statistics year chart ] end -->

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
