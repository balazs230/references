<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BlogHistory;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('count.views')->only('show');
        $this->middleware('blog.history')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles/index', [
            'articles' => Article::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles/create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|max:100',
            'content' => 'bail|required|max:10000'
        ]);

        $article = new Article;
        $article->category_id = $request->category_id;
        $article->title = $request->title;
        $article->content = strip_tags($request->content);
        $article->save();

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */

    

    public function show(Article $article)
    {
        return view('post', [
            'article' => $article,
            'related_articles' => Article::where('category_id', '=', $article->category_id)->orderBy('created_at', 'desc')->limit(3)->get(),
            'latest_articles' => Article::latest()->limit(3)->get(),
            'categories' => Category::all()->split(2),
            'comments' => Comment::orderBy('created_at', 'desc')->get()
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles/edit', [
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'bail|required|max:100',
            'content' => 'bail|required|max:10000'
        ]);

        $article->category_id = $request->category_id;
        $article->title = $request->title;
        $article->content = strip_tags($request->content);
        $article->save();

        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back();
    }
}
