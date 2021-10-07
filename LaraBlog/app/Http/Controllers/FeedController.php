<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('blog.history')->only('index', 'showCategoryPosts');
    }

    public function index()
    {
        return view('feed', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(10),
            'categories' => Category::all()->split(2),
            'popular_articles' => Article::orderBy('views', 'desc')->limit(3)->get()
        ]); 

    }

    public function search(Request $request)
        {
            return view('feed', [
                'articles' => Article::where('content', 'LIKE', '%' . $request->search . '%')->orWhere('title', 'LIKE', '%' . $request->search . '%')->paginate(5),
                'popular_articles' => Article::orderBy('views', 'DESC')->limit(3)->get(),
                'categories' => Category::all()->split(2)
            ]);
        }
        
    public function showCategoryPosts(Request $request)
    {
        return view('show_category_posts', [
            'articles' => Category::find($request->id)->articles()->orderBy('created_at', 'DESC')->paginate(5),
            'category' => Category::find($request->id),
            'categories' => Category::all()->split(2),
            'popular_articles' => Article::orderBy('views', 'desc')->limit(3)->get()
        ]);
    }

    


}
