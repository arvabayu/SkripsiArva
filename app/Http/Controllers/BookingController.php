<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.booking', [
            'bookings' => Booking::where('user_id',auth()->id())->get(),
        ]);
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
        $validate = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'status' => 'required',
            'is_denda' => 'required',
            // 'code' => 'required',
        ]);
        $expired_at=Carbon::now()->addDay($request->get('hari'));
        $data=new Booking;
        $data->user_id=auth()->id();
        $data->book_id=$request->get('book_id');
        $data->status=$request->get('status');
        $data->alasan="-";
        $data->expired_at=$expired_at;
        $data->save();
        //Update Data Booking Code
        $data_booking=Booking::latest()->first();
        $data_booking->code=$data_booking->id . $data_booking->book_id . $data_booking->created_at->format('dmy');
        $data_booking->save();
        $user=User::find(auth()->id());
        $user->total_dipinjam+=1;
        $user->save();
        return redirect()->route('member-books.index')->with('success', 'peminjaman berhasil diajukan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking=Booking::find($id);
        $tahun=date('Y', strtotime($booking->expired_at));
        $bulan=date('m', strtotime($booking->expired_at));
        $tanggal=date('d', strtotime($booking->expired_at));
        
        $tanggal=date('d M Y', strtotime($booking->expired_at));
        return view('pages.bookingDetail',compact('booking','tanggal','tahun','bulan','tanggal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->get('expired_at'));
        $booking=Booking::find($id);
        $booking->alasan=$request->get('alasan');
        $booking->status=$request->get('status');
        $booking->expired_at=$request->get('expired_at');
        $booking->save();
         return redirect()->route('member-booking.index')->with('success', 'peminjaman berhasil diajukan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
