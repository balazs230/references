@extends('layouts.admin')

@section('content')
    
        <!-- start main content -->
        <div class="row">

            <div class="col-lg-12">
 
                <h2>Toate comenzile</h2>

                <div class="row"> 
                    
                    @foreach ($orders as $order)

                    <div class="col-md-4">
                        
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Numar carti <span style="float: right; font-weight: bolder;"><a href="#" data-toggle="modal" data-target="#modal-detalii-1">{{ $order->books()->count() }}</a></span></h5>
                                <h5 class="card-title">Pret total <span style="float: right; font-weight: bolder;">{{ $order->total_price }}</span></h5>
                                <h5 class="card-title">Data <span style="float: right; font-weight: bolder;">{{ $order->created_at }}</span></h5>
                                <h5 class="card-title">Client <span style="float: right; font-weight: bolder;"><a href="{{ route('user.orders', ['id'=>$order->user->id]) }}">{{ $order->user->name }}</a></span></h5>
                                <hr>
                                <h5 class="card-title">Adresa de livrare</h5>
                                <p class="card-text">{{ $order->user->address }}</p>
                                <hr>
                                @if ($order->status == 'pending')
                                        <h6 class="card-title">Status <span style="float: right; color:brown;">{{ $order->status }}</span></h6>
                                   @else
                                        <h6 class="card-title">Status <span style="float: right; color:rgba(4, 185, 4, 0.884);">{{ $order->status }}</span></h6>
                                @endif
                                <hr>
                                <a href="{{ route('orders.show', ['order'=>$order->id ]) }}" class="card-link">Finalizeaza</a>
                                <a onclick="event.preventDefault(); document.getElementById('order-delete-{{ $order->id }}').submit();" href="{{ route('orders.destroy', ['order'=>$order->id ]) }}" class="card-link" style="float: right;">Sterge</a>
                                <form action="{{ route('orders.destroy', ['order'=>$order->id ]) }}" method="POST" id="order-delete-{{ $order->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                        <div class="modal" id="modal-detalii-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nr.</th>
                                                    <th>Carte</th>
                                                    <th>Pret Carte</th>
                                                    <th>Cantitate</th>
                                                    <th>Pret Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($order->books as $item)
                                                  <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>{{ $item->pivot->quantity }}</td>
                                                    <td>{{ $item->price * $item->pivot->quantity }}</td>
                                                </tr>  
    
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                   
                    


                </div>
            </div>
                {{ $orders->links() }}
        </div>

@endsection