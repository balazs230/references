<?php

namespace App\Http\Controllers;

use App\Mail\DeleteOrderMail;
use App\Mail\FinishOrderMail;
use App\Mail\PlaceOrder;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function cart()
    {
        return view('cart', [
            'recommended_books' => Book::orderBy('created_at', 'desc')->limit(3)->get(),
        ]);
    }
    public function addToCart(Request $request, $id)
    {
        $product = Book::find($id);
        if(!$product) {
            abort(404);
        }
   
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "title" => $product->title,
                        "quantity" => $request->quantity,
                        "price" => $product->price,
                    ]
            ];

            if($product->stock >= $cart[$id]['quantity']){
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
            else echo "<script> alert('Quantity too high! From this book we only have $product->stock in stock.') </script>";
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;

            if($product->stock >= $cart[$id]['quantity']){
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product added to cart successfully!');
                }
                else echo "<script> alert('Quantity too high! From this book we only have $product->stock in stock.') </script>";
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $product->title,
            "quantity" => $request->quantity,
            "price" => $product->price,
        ];

        if($product->stock >= $cart[$id]['quantity']){
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
            else echo "<script> alert('Quantity too high! From this book we only have $product->stock in stock.') </script>";
    
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders', ['books' => Book::all(), 'orders' => Order::orderBy('updated_at', 'desc')->paginate(6) ]);
    }

    public function user_orders(Request $request)
    {
        return view('orders_by_user', [
            'orders' => Order::where('user_id', '=' , $request->id)->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $total = 0;
        $order = new Order;
        $order->user_id = Auth::user()->id;

        foreach(session('cart') as $id => $details){
            $total += $details['price'] * $details['quantity'];
    }
        $order->total_price = $total;
        
        $order->save();

        // adaugarea datelor la tabelul pivot
    foreach(session('cart') as $id => $details){
            $order->books()->attach([ $id => ['quantity' => $details['quantity']] ]);
    }
    
        foreach(session('cart') as $id => $details){
            Book::find($id)->decrement('stock', $details['quantity']);
        }

        $request->session()->forget('cart');

        Mail::to(Auth::user()->email)->send(new PlaceOrder($order));
   
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    // Aceasta metoda este folosita pentru finalizarea comenzii
    public function show(Order $order)
    {
        $order->status = 'finalizat';

        $order->save();

        Mail::to($order->user->email)->send(new FinishOrderMail($order));

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        DB::transaction(function () use($order) {

            Mail::to($order->user->email)->send(new DeleteOrderMail($order));

            DB::table('book_order')->where('order_id', '=', $order->id)->delete();

            $order->delete();
        });
        
        return redirect()->back();
    }
}
