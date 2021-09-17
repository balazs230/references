<!DOCTYPE html>
<html lang="en">

<head>
    <title>Subscribers</title>
    
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

                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Subscribers</h5>
                                            <span class="d-block m-t-5">Email list of those who signed up for the news feed.</span>
                                        </div>
                                        <div class="card-block table-border-style pb-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Email</th>
                                                            <th>Subscribed on</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                                       
                                                        @if (count($subscribers) > 0)
                                                                @foreach ($subscribers as $subscriber)
                                                                    <tr>
                                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                                    <td>{{ $subscriber->email }}</td>
                                                                    <td><h6 class="text-muted">{{ $subscriber->created_at }}</h6></td>
                                                            <td> 
                                                                <a onclick="event.preventDefault(); document.getElementById('subscriber-delete-{{ $subscriber->id }}').submit();" href="{{ route('subscribers.destroy', ['subscriber'=>$subscriber->id ]) }}"><i class="fas fa-times f-20 text-c-red"></i></a>
                                                            <form action="{{ route('subscribers.destroy', ['subscriber'=>$subscriber->id ]) }}" method="POST" id="subscriber-delete-{{ $subscriber->id }}">
                                                                    @csrf
                                                                    @method('DELETE')

                                                            </form>
                                                               
                                                            </td>
                                                        </tr>
                                                                @endforeach
                                                                 
                                                            @else
                                                                <tr>
                                                                    <td>There is no any subscriber</td>
                                                                </tr>
                                                            @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr />
                                            <!-- Pagination links
                                            <nav aria-label="Page navigation example">
                                                <div class="pagination justify-content-center">
                                                    links()
                                                </div>
                                            </nav> -->
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
