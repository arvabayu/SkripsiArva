<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Booking;
use App\Models\Pengembalian;
use App\Models\User;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.booking.index', [
            'bookings' => Booking::with('user')->where('status','Diajukan')
            ->orwhere('status','Disetujui')
            ->orwhere('status','Perpanjang Peminjaman')
            ->get(),
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking=Booking::find($id);
        $book=Book::get();
        return view('admin.pages.booking.show',compact('booking','book'));
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
        $booking=Booking::find($id);
        $book=Book::find($booking->book_id);
        $status = $request->get('status');
        $user=User::find($booking->user_id);
        if ($booking->book->stock > 0) {
            if ($status == "Disetujui") {
                $booking->status=$status;
                $booking->save();
                $book->stock-=1;
                $book->save();
            } else if ($status == 'Ditolak') {
                $booking->status=$status;
                $booking->save();
                $user->total_dipinjam-=1;
                $user->save();
            } else if ($status == 'Dikembalikan'){
                $booking->status=$status;
                $booking->save();
                $book->stock+=1;
                $book->save();
                $user->total_dipinjam-=1;
                $pengembalian= new Pengembalian;
                $pengembalian->booking_id=$booking->id;
                if($booking->expired_at < now()){
                    $pengembalian->status_peminjaman="Terlambat";
                    $pengembalian->dikembalikan=now();
                    $pengembalian->save();
                    $user->status_peminjaman+=1;
                    $user->save();
                }else{
                    $pengembalian->status_peminjaman="Tidak Terlambat";
                    $pengembalian->dikembalikan=now();
                    $pengembalian->save();
                    $user->save();
                }
            }
        } else {
            $booking->status='Ditolak';
            $booking->save();
            $user->total_dipinjam-=1;
            $user->save();
        }
        return redirect()->route('admin-booking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
    public function pengembalian_book()
    {

          return view('admin.pages.booking.pengembalian', [
            'pengembalian' => Pengembalian::with('user','book','booking')->get(),
                     'bookings' => Booking::with('user')
            ->where('status','Disetujui')
            ->orwhere('status','Perpanjang Peminjaman')
            ->get(),
        ]);
    }
}
