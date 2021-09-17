<!DOCTYPE html>
<html lang="en">

<head>
    <title>Categories</title>
    
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

                                <div class="col-md-7 col-xl-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Categories</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Articles</th>
                                                            <th>Created At</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tbody>
                                                            @if (count($categories) > 0)
                                                                @foreach ($categories as $category)
                                                                    <tr>
                                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                                    <td>{{ $category->category_name }}</td>
                                                                    <td><a href="{{ route('categories.showArticlesByCategory', ['id'=>$category->id]) }}">{{ $category->articles()->count() }}</a></td>
                                                                    <td><h6 class="text-muted">{{ date('d.m.Y', strtotime($category->created_at)) }}</h6></td>
                                                            <td> 
                                                                <a onclick="event.preventDefault(); document.getElementById('category-delete-{{ $category->id }}').submit();" href="{{ route('categories.destroy', ['category'=>$category->id ]) }}"><i class="fas fa-times f-20 text-c-red"></i></a>
                                                            <form action="{{ route('categories.destroy', ['category'=>$category->id ]) }}" method="POST" id="category-delete-{{ $category->id }}">
                                                                    @csrf
                                                                    @method('DELETE')

                                                            </form>
                                                               
                                                            </td>
                                                        </tr>
                                                                @endforeach
                                                                 
                                                            @else
                                                                <tr>
                                                                    <td>There is no any category</td>
                                                                </tr>
                                                            @endif
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Create Category</h5>
                                        </div>
                                        <div class="card-body">
                                        <form action="{{ route('categories.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input type="text" class="form-control @error('name') 'is-invalid'  @enderror" name="name">

                                                    @error('name')
                                                       <small class="form-text" style="color: red;">{{ $message  }}</small> 
                                                    @enderror
                                                
                                                </div>
                                                <button class="btn btn-primary shadow-1 text-uppercase btn-block mt-5 mr-0" type="submit">create</button>
                                            </form> 
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
