@extends('layouts.site')

@section('content')


    <!-- start left side column -->
    <div class="col-lg-4">
                    
        <!-- start search -->
        <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action active disabled"> Cauta </li>
            <li class="list-group-item list-group-item-action">
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">Go</button>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
        <!-- end search -->
        <br /><br />

        <!-- start categories -->
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action active disabled"> Categorii </a>
            @foreach ($categories as $category)
               <a href="{{ route('site.showCategoryBooks', ['id'=>$category->id]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    {{ $category->category_name }}
                    <span class="badge badge-info badge-pill">{{ $category->books()->count() }}</span>
                </a> 
            @endforeach
        </div>
        <!-- end categories -->
    </div>
    <!-- end left side column -->

    <!-- start books column -->
    <div class="col-lg-8">

        
              
            <div class="row">
                @if (count($books) > 0)
                    @foreach ($books as $book)
                    
                
                <div class="col-md-6">
                    <div class="card">
                        <a href="{{ route('books.show', ['book'=>$book->id ]) }}"><img class="card-img-top" src="{{ asset('storage/books/images/' . $book->image) }}" style="object-fit: cover;" height="200px"></a>
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text" style="color: red;">
                                <b>{{ $book->price }}</b><sup>00</sup> Lei
                            </p>
                            <a href="{{ route('books.show', ['book'=>$book->id ]) }}" class="btn btn-primary btn-block">Vezi detalii</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <h3>There are no books in this category.</h3>
                @endif
                
                
            </div>
            <br />
     

        <br />

        <!-- start pagination -->
        <ul class="pagination justify-content-center">
            <li></li>
        </ul>
    </div>
    <!-- end books column -->
    
@endsection