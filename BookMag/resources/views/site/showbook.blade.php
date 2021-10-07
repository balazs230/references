@extends('layouts.site')

@section('content')

<div class="col-lg-12">

    <!-- start sectiune carte -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img class="card-img-top rounded" src="{{ asset('storage/books/images/' . $book->image) }}">
                </div>
                <div class="col-md-5">
                    <h5 class="card-title mb-4" style="color: black;">{{ $book->title }}</h5>
                    <p style="text-align: justify;">
                        @if (!empty($book->description))
                            {{ $book->description->text }}
                        @else
                            No available description.
                        @endif                        
                    </p>
                    <br>
                </div>
                <div class="col-md-3">
                    <p class="card-text">
                        @if ($book->discount > 0)
                           <span style="color: red; font-size: 25px;"><b>{{ $book->discount }}</b><sup>00</sup> Lei</span>
                            &nbsp; &nbsp;
                            <span style="color: #333333; font-size: 15px;"><del>{{ $book->price }}</del><sup>00</sup> Lei</span>
                        @else
                        <span style="color: red; font-size: 25px;"><b>{{ $book->price }}</b><sup>00</sup> Lei</span>
                        @endif
                        
                    </p>
                    @if ($book->stock > 0)
                       <p class="disponibilitate-produs" style="color: green; font-weight:bold;">în stoc</p> 
                    @else
                        <p class="disponibilitate-produs" style="color: red; font-weight:bold;">Epuizat</p>
                    @endif
                    

                    <div class="mb-5">
                        <span style="color: grey;font-size:15px;">Rating: @if (count($reviews) > 0)
                            
                        @php
                            $sum = 0;
                            $counter = 0;
                            foreach ($reviews as $item){
                                $sum += $item->rating;
                                $counter++;
                            }
                            $rating = round($sum/$counter);
                        @endphp</span>
                        <br />
                        @switch($rating)
                        @case(1)
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            @break
                        @case(2)
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            @break
                        @case(3)
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            @break
                        @case(4)
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="far fa-star" style="color: #ff9900;"></i>
                            @break
                        @case(5)
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            <i class="fas fa-star" style="color: #ff9900;"></i>
                            @break
                        @default
                            <p>No rating.</p>
                    @endswitch
                    @endif 
                        <br />
                        <span style="font-size:14px;">{{ $book->reviews->count() }} review-uri</span>
                    </div>

                    <form action="{{ url('add-to-cart/'.$book->id) }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button" onclick="booksQuantity('-')" style="font-weight: bold;">-</button>
                            </div>
                            <input type="text" class="form-control" name="quantity" value="1" id="quantity" style="width: 50%;text-align:center;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="booksQuantity('+')" style="font-weight: bold;">+</button>
                            </div>
                        </div>
                        @if ($book->stock == 0)
                            <a href="" class="btn btn-primary btn-block disabled">Adaugă în coș</a>
                        @else
                            <button type="submit" class="btn btn-primary btn-block">Adaugă în coș</button>
                        @endif
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end sectiune carte -->
    
    <br />

    <!-- start sectiune detalii carte -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#descriere">Descriere</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#detalii">Detalii</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#review">Review</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane container pt-4 active" id="descriere">
                            <p style="text-align: justify;">
                                @if (!empty($book->description))
                                    {{ $book->description->text }} 
                                @else
                                    No available description.
                                @endif
                            </p>
                        </div>
                        <div class="tab-pane container pt-4 fade" id="detalii">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Categorie</th>
                                        <td>{{ $book->category->category_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Autor</th>
                                        <td>{{ $book->author }}</td>
                                    </tr>
                                    <tr>
                                        <th>Numar Pagini</th>
                                        <td>{{ $book->pages }}</td>
                                    </tr>
                                    <tr>
                                        <th>An publicare</th>
                                        <td>{{ date('Y', strtotime($book->publication)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Limba</th>
                                        <td>{{ $book->language }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dimensiune</th>
                                        <td>{{ $book->size }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane container pt-4 fade" id="review">

                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="custom-control custom-radio custom-control-inline mb-2">
                                            <input type="radio" class="custom-control-input" id="rating-1" name="rating" value="1">
                                            <label class="custom-control-label" for="rating-1" style="cursor: pointer;">
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                            </label>
                                        </div>
                                        <br />
                                        <div class="custom-control custom-radio custom-control-inline mb-2">
                                            <input type="radio" class="custom-control-input" id="rating-2" name="rating" value="2">
                                            <label class="custom-control-label" for="rating-2" style="cursor: pointer;">
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                            </label>
                                        </div>
                                        <br />
                                        <div class="custom-control custom-radio custom-control-inline mb-2">
                                            <input type="radio" class="custom-control-input" id="rating-3" name="rating" value="3">
                                            <label class="custom-control-label" for="rating-3" style="cursor: pointer;">
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                            </label>
                                        </div>
                                        <br />
                                        <div class="custom-control custom-radio custom-control-inline mb-2">
                                            <input type="radio" class="custom-control-input" id="rating-4" name="rating" value="4">
                                            <label class="custom-control-label" for="rating-4" style="cursor: pointer;">
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="far fa-star" style="color: #ff9900;"></i>
                                            </label>
                                        </div>
                                        <br />
                                        <div class="custom-control custom-radio custom-control-inline mb-2">
                                            <input type="radio" class="custom-control-input" id="rating-5" name="rating" value="5">
                                            <label class="custom-control-label" for="rating-5" style="cursor: pointer;">
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                                <i class="fas fa-star" style="color: #ff9900;"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nume" />
                                            @error('name')
                                            <small class="form-text" style="color: red;">{{ $message  }}</small> 
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea name="text" class="form-control @error('text') is-invalid @enderror" rows="3" placeholder="Mesaj"></textarea>
                                            @error('text')
                                            <small class="form-text" style="color: red;">{{ $message  }}</small> 
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Adauga Review</button>
                                    </div>
                                </div>
                            </form>
                            <hr /><br />

                            <div class="border">
                                @if (count($reviews) > 0)
                                    @foreach ($reviews as $review)
                                        <div class="media p-3">
                                        <img src="{{ asset('storage/imagini/avatar.png') }}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                            <div class="media-body">
                                                <h4>{{ $review->name }}</h4> 
                                                <small class="mb-3"><i>{{ date('M d, Y', strtotime($review->created_at)) }}</i></small>
                                                <br />
                                                @switch($review->rating)
                                                    @case(1)
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        @break
                                                    @case(2)
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        @break
                                                    @case(3)
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        @break
                                                    @case(4)
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="far fa-star" style="color: #ff9900;"></i>
                                                        @break
                                                    @case(5)
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        <i class="fas fa-star" style="color: #ff9900;"></i>
                                                        @break
                                                    @default
                                                        <p>No rating.</p>
                                                @endswitch
                                                <br /><br />
                                                <p>{{ $review->text }}</p>
                                            </div>
                                        </div>
                                        
                                        <hr style="width: 90%;" />
                                    @endforeach

                                @endif
                                
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end sectiune detalii carte -->

    <br />

    <!-- start card alte oferte -->
    <div class="card">
        <div class="card-header">Alte oferte</div>
        <div class="card-body">
            <div class="row">

                @foreach ($related_books as $item)
                    <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/books/images/' . $item->image) }}" style="object-fit: cover;" height="200px">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <h6>{{ $item->author }}</h6>
                            <p class="card-text" style="color: red;">
                                <b>{{ $item->price }}</b><sup>00</sup> Lei
                            </p>
                            <a href="{{ route('books.show', ['book'=>$item->id ]) }}" class="btn btn-primary btn-block">Vezi detalii</a>
                        </div>
                    </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- end card alte oferte -->

</div>

<script>

    function booksQuantity(operator){
        var quantity = document.querySelector('#quantity');

        switch(operator){
            case '+':
                quantity.value = parseInt(quantity.value) + 1;
                break;
            case '-':
                quantity.value = parseInt(quantity.value) > 1 ? parseInt(quantity.value) - 1 : 1;
                break;
        }
    }

</script>
    
@endsection