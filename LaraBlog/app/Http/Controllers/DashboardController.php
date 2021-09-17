<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'articles' => Article::all(),
           // 'articles_with_comments' => Article::where('comments', '>', 0)->get(),
            'categories' => Category::all(),
            'comments' => Comment::orderBy('created_at', 'desc')->get(),
            'subscribers' => Subscriber::all()
        ]);
    }
}
