<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users' => User::all()->count(),
            'books' => Book::all()->sum('stock'),
            'orders' => Order::all()->count(),
            'today_orders' => Order::whereDate('created_at', '=', date('Y-m-d'))->count(),
            'total_books' => DB::table('book_order')->sum('quantity'),
            'today_books' => DB::table('book_order')->whereDate('created_at', '=', date('Y-m-d'))->sum('quantity'),
            'total_income' => Order::sum('total_price'),
            'today_income' => Order::whereDate('created_at', '=', date('Y-m-d'))->sum('total_price'),
            'books_with_discount' => Book::where('discount', '>', 0)->count()
        ]);
    }
}
