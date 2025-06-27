<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        return view("pages.books", [
            'books' => Book::all(),
            'category' => Category::all(),
        ]);
    }
    public function index_filter(Request $request)
    {
        $filter=$request->get('searchKeyword');
        $books=Book::where('category_id',$request->get('category'))->where('title','like',$filter."%")->get();
        $category=Category::all();
        return view("pages.books",compact('category','books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book=Book::find($id);
        return view('pages.booksDetail',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
