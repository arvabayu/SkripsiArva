<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_user=User::all();
        return view("admin.pages.user.index",compact('data_user'));
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
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:5',
            'email' => 'required|email',
            'nis_nip' => 'required|min:10',
            'notel' => 'required|min:10',
            'password' => 'required|min:5',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->back()->with('success', 'User berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $data_user=User::find($id);
        return view("admin.pages.user.show",compact('data_user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validatedData = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:5',
            'email' => 'required',
            'nis_nip' => 'required',
        ]);

        if (isset($validatedData['cover'])) {
            $validatedData['cover'] = $request->file('cover')->store('books-cover');
        };

        // $book->update($validatedData);
        $data= User::find($id);
        $data->name=$request->get('name');
        $data->username=$request->get('username');
        $data->email=$request->get('email');
        $data->nis_nip=$request->get('nis_nip');
        $data->notel=$request->get('notel');
        $data->role=$request->get('role');
        $data->save();
        return redirect()->back()->with('success', 'buku berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_user=User::find($id);
        $data_user->delete();
        return redirect()->route('admin-user.index');
    }
}
