<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::all();
        $category=Category::get();
        $category_all=Category::all();
        return view("admin.pages.books.index", compact('books','category','category_all'));
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
        $validated = $request->validate([
            'image'=>'mimes:jpeg,png'
        ],[
            'image.mimes'=>"Please insert image extension JPEG,PNG"
        ]);
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'code' => 'required|min:5',
            'author' => 'required',
            'publisher' => 'required',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'stock' => 'required',
            'cover' => 'image|file|max:1024|mimes:jpeg,png',
        ],[
            'cover.mimes'=>"Please insert image extension JPEG,PNG"
        ]);
        // $coba=Book::create($validatedData);
        $data= new Book;
        $data->title=$request->get('title');
        $data->code=$request->get('code');
        $data->cover=$request->get('cover');
        $data->author=$request->get('author');
        $data->publisher=$request->get('publisher');
        $data->description=$request->get('description');
        $data->category_id=$request->get('category_id');
        $data->stock=$request->get('stock');
        if ($request->file('cover')) {
            $cover_name = $request->file('cover')->store('images', 'public');
        }else{
            $cover_name=null;
        }
        $data->cover = $cover_name;

        $data->save();
        return redirect()->back()->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $book=Book::find($id);
        $category=Category::get();
        $category_all=Category::all();
        return view('admin.pages.books.show',compact('book','category_all','category'));
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
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'code' => 'required|min:5',
            'author' => 'required',
            'publisher' => 'required',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'stock' => 'required',
            'cover' => 'image|file|max:1024|mimes:jpeg,png',
        ]);
        $data= Book::find($id);
        $data->title=$request->get('title');
        $data->code=$request->get('code');
        $data->cover=$request->get('cover');
        $data->category_id=$request->get('category_id');
        $data->publisher=$request->get('publisher');
        $data->author=$request->get('author');
        $data->stock=$request->get('stock');
        $data->description=$request->get('description');
                if ($request->file('cover')) {
            $cover_name = $request->file('cover')->store('images', 'public');
        }else{
            $cover_name=null;
        }
        $data->cover = $cover_name;
        $data->save();
        return redirect()->back()->with('success', 'buku berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book=Book::find($id);
        $book->delete();

        return redirect()->route('admin-books.index')->with('success', 'buku berhasil dihapus!');
    }
}
