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

        @if (count($rows) > 0)

            @foreach ($rows as $row)
              
            <div class="row">

                @foreach ($row as $col)
                    
                
                <div class="col-md-6">
                    <div class="card">
                        <a href="{{ route('books.show', ['book'=>$col->id ]) }}"><img class="card-img-top" src="{{ asset('storage/books/images/' . $col->image) }}" style="object-fit: cover;" height="200px"></a>
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">{{ $col->title }}</h5>
                            <h6 class="card-title">{{ $col->author }}</h6>
                            <p class="card-text" style="color: red;">
                                <b>{{ $col->price }}</b><sup>00</sup> Lei
                            </p>
                            <a href="{{ route('books.show', ['book'=>$col->id ]) }}" class="btn btn-primary btn-block">Vezi detalii</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            <br />
        @endforeach

        @else
            <h2>Sorry! Currently we have no books in stock.</h2>

        @endif
        

        <br />

        <!-- start pagination -->
        <ul class="pagination justify-content-center">
            <li></li>
        </ul>
    </div>
    <!-- end books column -->
    
@endsection