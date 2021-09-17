@extends('layouts.site')

@section('content')

<div class="col-lg-12">

    <br /><br />

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">

<?php $total = 0; $totalbooks = 0; ?>
@if(session('cart'))

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nr.</th>
                                <th>Carte</th>
                                <th>Pret Carte</th>
                                <th>Cantitate</th>
                                <th>Pret Total</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>


    @foreach(session('cart') as $id => $details)
        <?php $total += $details['price'] * $details['quantity']; $totalbooks += $details['quantity']; ?>
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $details['title'] }}</td>
            <td>{{ $details['price'] }} lei</td>
            <td data-th="Quantity">{{ $details['quantity'] }}</td>
            <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} lei</td>      
            <td><button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">sterge</button></td>
        </tr>
    @endforeach

@else No books added yet.

@endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <dl>
                        <dt>Numar Produse</dt>
                        <dd>{{ $totalbooks}}</dd>
                        <dt>Pret Total</dt>
                        <dd>{{ $total }}</dd>
                    </dl>
                    <hr>

                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">Plaseaza Comanda</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <br />

    <!-- start card alte oferte -->
    <div class="card">
        <div class="card-header">Alte oferte</div>
        <div class="card-body">
            <div class="row">

                @foreach ($recommended_books as $item)
                    <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/books/images/' . $item->image) }}" style="object-fit: cover;" height="200px">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">{{ $item->title }}, {{ $item->author }}</h5>
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

<script type="text/javascript">
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
</script>
    
@endsection