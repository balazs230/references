<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Description;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->middleware('admin.check')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books/index', ['books' => Book::orderBy('title', 'asc')->paginate(10) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books/create', ['categories' => Category::orderBy('category_name', 'asc')->get() ]);
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
            'title' => 'bail|required|max:200',
            'category_id' => 'bail|required',
            'author' => 'bail|required|max:150',
            'language' => 'bail|required|max:50',
            'size' => 'bail|required|max:50',
            'price' => 'bail|required|max:10',
            'discount' => 'bail|required|max:100',
            'stock' => 'bail|required|max:100',
            'pages' => 'bail|required|max:100',
            'publication' => 'bail|required|max:100',
            'image' => 'bail|required|image'   
        ]);

        $image = $request->file('image');

        $name = time() . '_' . $image->getClientOriginalName();

        $image->storeAs('books/images', $name, 'public');

        $book = new Book;
        $book->title = $request->title;
        $book->category_id = $request->category_id;
        $book->author = $request->author;
        $book->language = $request->language;
        $book->size = $request->size;
        $book->price = $request->price;
        $book->discount = $request->discount;
        $book->stock = $request->stock;
        $book->pages = $request->pages;
        $book->publication = $request->publication;
        $book->image = $name;
        
        $book->save();

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('site/showbook', [
            'book' => $book,
            'related_books' => Book::where('category_id', '=', $book->category_id)->orderBy('created_at', 'desc')->limit(3)->get(),
            'reviews' => Review::where('book_id', '=', $book->id)->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books/edit', [
            'book' => $book, 
            'categories' => Category::orderBy('category_name', 'asc')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'bail|required|max:200',
            'author' => 'bail|required|max:150',
            'language' => 'bail|required|max:50',
            'size' => 'bail|required|max:50',
            'price' => 'bail|required|max:10',
            'discount' => 'bail|required|max:100',
            'stock' => 'bail|required|max:100',
            'pages' => 'bail|required|max:100',
            'publication' => 'bail|required|max:100',
            'image' => 'bail|image'   
        ]);

        if($request->image){
        $image = $request->file('image');

        $name = time() . '_' . $image->getClientOriginalName();

        $image->storeAs('books/images', $name, 'public');
        $book->image = $name;
        };
        
        $book->title = $request->title;
        $book->category_id = $request->category_id;
        $book->author = $request->author;
        $book->language = $request->language;
        $book->size = $request->size;
        $book->price = $request->price;
        $book->discount = $request->discount;
        $book->stock = $request->stock;
        $book->pages = $request->pages;
        $book->publication = $request->publication;
        
        $book->save();

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        DB::transaction(function () use($book) {

            DB::table('descriptions')->where('book_id', '=', $book->id)->delete();

            DB::table('reviews')->where('book_id', '=', $book->id)->delete();

            Storage::disk('public')->delete('\books\images\\' . $book->image);

            $book->delete();
        });
        

        return redirect()->back();
    }
}
