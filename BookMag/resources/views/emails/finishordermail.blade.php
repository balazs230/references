<h3>Buna ziua, {{ $order->user->name }}!</h3>

<p>Comanda ta a fost procesata si finalizata cu succes.</p>

<p>Mai jos vezi inca o data detaliile despre comanda</p>

<b>Order ID: </b>#{{ $order->id }} <br><br>

<b>Carti: </b> @foreach ($order->books as $book)
    <i>{{ $book->title }}; </i>
@endforeach <br><br>

<b>Data: </b> {{ $order->created_at }} <br><br>

<b>Total de plata: </b> {{ $order->total_price }} lei <br><br>

<p>Cartile alese sunt deja pe drum spre tine.</p>

<h4>Citire placuta!</h4>