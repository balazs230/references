<h3>Buna ziua, {{ $order->user->name }}!</h3>

<p>Ai plasat cu succes o comanda pe site-ul BookMag!</p>

<b>Detaliile comenzii</b> <br><br>

<b>Order ID: </b>#{{ $order->id }} <br><br>

<b>Carti:</b> @foreach ($order->books as $book)
    <i>{{ $book->title }}; </i>
@endforeach <br><br>

<b>Data: </b> {{ $order->created_at }} <br><br>

<b>Total de plata:</b> {{ $order->total_price }} lei <br><br>

<p>In curand vei primi notificare despre statusul comenzii.</p>