<!DOCTYPE html>
<html lang="en">

<head>
    <title>History</title>
    
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
                                            <h5>History</h5>
                                            <span class="d-block m-t-5">The last 100 links accessed from the site.</span>
                                        </div>
                                        <div class="card-block table-border-style pb-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>URL</th>
                                                            <th>IP</th>
                                                            <th>Time</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        @foreach ($histories as $history)
                                                            <tr>
                                                                <th scope="row">{{ $loop->iteration }}</th>
                                                                <td><a href="{{ $history->URL }}">{{ $history->URL }}</a></td>
                                                                <td>{{ $history->IP }}</td>
                                                                <td>{{ date('H:m:s', strtotime($history->created_at)) }}</td>
                                                                <td>{{ date('d.m.Y', strtotime($history->created_at)) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr />
                                         <nav aria-label="Page navigation example">
                                                <div class="pagination justify-content-center">
                                                    {{ $histories->links() }}
                                                </div>
                                            </nav>
                                           
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
