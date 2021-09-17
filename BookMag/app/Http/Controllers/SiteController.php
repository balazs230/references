<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site/index', [
            'categories' => Category::orderBy('category_name', 'asc')->get(),
            'rows' => Book::all()->chunk(2)
        ]);
    }


    public function search(Request $request)
        {
            return view('site/index', [
                'rows' => Book::where('title', 'LIKE', '%' . $request->search . '%')->orWhere('author', 'LIKE', '%' . $request->search . '%')->paginate(10)->chunk(2),
                'categories' => Category::orderBy('category_name', 'asc')->get(),
            ]);
        }
    

    public function showCategoryBooks(Request $request)
    {
        return view('site/showCategoryBooks', [
            'categories' => Category::orderBy('category_name', 'asc')->get(),
            'books' => Category::find($request->id)->books()->get(),
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
