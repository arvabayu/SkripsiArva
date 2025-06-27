@extends('layouts.main')

@section('main-content')
<div class="container mt-4" style="margin-bottom: 6rem">
  {{-- breadcrumb --}}
  <nav class="my-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
      <li class="breadcrumb-item"><a href="/booking" class="text-decoration-none">Daftar Peminjaman</a></li>
      <li class="breadcrumb-item active" aria-current="page">Peminjaman {{ $booking->code }}</li>
    </ol>
  </nav>

  {{-- card --}}
  <div class="row">

    <!-- Cover Image -->
    <div class="col-md-3">
      <div class="card shadow mb-4">
          <div class="card-body">
            <img src="{{ asset('img/bookCoverDefault.png') }}" class="object-fit-contain align-items-center" style="width: 100%" alt="...">
          </div>
      </div>
    </div>

      <!-- Information -->
      <div class="col-md-8">
          <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold">Detail Peminjaman</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <table>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Kode Peminjaman : </td>
                    <td>{{$booking->code}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Status : </td>
                    <td>
                      @if($booking->status == 'Dikembalikan')
                        @if ($booking->expired_at < now())
                          <p class="badge text-bg-danger mb-0">{{ $booking->status }} terlambat</p>
                        @else
                          <p class="badge text-bg-secondary mb-0">{{ $booking->status }}</p>
                        @endif
                      @elseif($booking->status == 'Disetujui')
                        @if ($booking->expired_at < now())
                          <p class="badge text-bg-danger mb-0">{{ $booking->status }} terlambat</p>
                        @else
                          <p class="badge text-bg-success mb-0">{{ $booking->status }}</p>
                        @endif
                      @elseif($booking->status == 'Perpanjang Peminjaman')
                          <p class="badge text-bg-primary mb-0">{{ $booking->status }} Diajukan</p>
                      @else
                        <p class="badge {{ ($booking->status == 'Diajukan') ? 'text-bg-warning' : '' }} {{ ($booking->status == 'Disetujui') ? 'text-bg-success' : '' }} {{ ($booking->status == 'Ditolak') ? 'text-bg-dark' : '' }} mb-0">{{ $booking->status }}</p>
                      @endif  
                    </td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Waktu Pinjam : </td>
                    <td>{{$booking->created_at->format('d M Y')}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Tenggat Kembali : </td>
                    <td>{{ $tanggal }}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Alasan Pinjam : </td>
                    <td>{{ $booking->alasan }}</td>
                  </tr>
                </table>
              </div>

              {{-- Info Buku --}}
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold">Informasi Buku</h6>
              </div>
              <div class="card-body">
                <table>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Judul Buku : </td>
                    <td>{{$booking->book->title}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Penulis : </td>
                    <td>{{$booking->book->author}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Penerbit : </td>
                    <td>{{$booking->book->publisher}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Stock Buku : </td>
                    <td>{{$booking->book->stock}}</td>
                  </tr>
                </table>
              </div>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 fw-bold">Perpanjang Pinjaman</h6>
                </div>
                <div class="card-body">
                @auth
                @if($booking->status=="Disetujui")
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalPinjam">
                  Perpanjang Pinjaman
                </button>      
                @endif          
                @else
                <a href="/login" class="btn btn-warning" >Pinjam Buku</a>
                @endauth
                </div>
      </div>

  </div>
</div>
<script type="text/javascript">
$(function(){
    var dtToday = new Date("{{$booking->expired_at}}");
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#inputdate').attr('min', maxDate);
});
</script>
@endsection

<!-- Modal Perpanjang Pinjaman -->
<div class="modal fade" id="exampleModalPinjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="{{route('member-booking.update',$booking->id)}}" method="post">
        @csrf
       @method('put')
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pinjam Buku {{ $booking->title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="alasan" class="form-label">Alasan Pinjam</label>
            <textarea class="form-control" id="alasan" rows="3" name="alasan"></textarea>
          </div>
          <div class="mb-3">
            <label for="expired_at" class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control" id="inputdate" name="expired_at">
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            {{-- <input type="text" name="user_id" value="{{ auth()->user->id }}" hidden> --}}
            <input type="text" name="book_id" value="{{ $booking->id }}" hidden>
            <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
            <input type="text" name="status" value="{{ 'Perpanjang Peminjaman' }}" hidden>
            <input type="text" name="is_denda" value="{{ 0 }}" hidden>
            <button type="submit" class="btn btn-warning">Setuju Pinjam</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pinjam Buku {{ $book->title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{route('member-booking.store')}}" method="post">
          <button type="submit" class="btn btn-warning">Setuju Pinjam</button>
        </form>
      </div>
    </div>
  </div>
</div> --}}