@extends('layouts.main')

@section('main-content')
<div class="container mt-4" style="margin-bottom: 6rem">
  {{-- breadcrumb --}}
  <nav class="my-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
      <li class="breadcrumb-item"><a href="/books" class="text-decoration-none">Koleksi Buku</a></li>
      <li class="breadcrumb-item active" aria-current="page">Title</li>
    </ol>
  </nav>

  {{-- card --}}
  <div class="row">

    <!-- Cover Image -->
    <div class="col-md-3">
      <div class="card shadow mb-4">
          <div class="card-body">
            @if($book->cover)
          <img class="card-img-top" src="/storage/{{ $book->cover }}" alt="Card image cap">
          @else
          <img class="card-img-top" src="{{ asset('img/bookCoverDefault.png') }}" alt="Card image cap">
          @endif
          </div>
      </div>
    </div>

      <!-- Information -->
      <div class="col-md-8">
          <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold">Detail Buku</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <table>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Judul : </td>
                    <td>{{$book->title}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Penulis : </td>
                    <td>{{$book->author}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Penerbit : </td>
                    <td>{{$book->publisher}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Kategori : </td>
                    <td>{{$book->category->name}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Deskripsi : </td>
                    <td>{{$book->description}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Stock : </td>
                    <td>{{$book->stock}}</td>
                  </tr>
                </table>
              </div>

              {{-- proses --}}
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold">Peminjaman</h6>
              </div>
              <div class="card-body">
                @auth
                  @if(auth()->user()->total_dipinjam >= 5 || auth()->user()->status_peminjaman >= 3)
                    @if(auth()->user()->total_dipinjam >= 5 && auth()->user()->status_peminjaman >= 3)
                    <h6 class="m-0 fw-bold">Akun Dibekukan, Hubungi Admin</h6>
                    @elseif(auth()->user()->total_dipinjam >= 5)
                    <h6 class="m-0 fw-bold">Jumlah Peminjaman Melebihi Batas</h6>
                    @elseif(auth()->user()->status_peminjaman >= 3)
                    <h6 class="m-0 fw-bold">Status Peminjaman tidak dapat dilakukan</h6>
                    @endif
                  @else
                    <form action="{{route('member-booking.store')}}" method="post">
                      @csrf
                        <select class="form-select" id="hari" name="hari">
                            <option value="3">3 Hari</option>
                            <option value="5">5 Hari</option>
                            <option value="7">7 Hari</option>
                            <option value="14">14 Hari</option>
                        </select>
                          {{-- <input type="text" name="user_id" value="{{ auth()->user->id }}" hidden> --}}
                          <input type="text" name="book_id" value="{{ $book->id }}" hidden>
                          <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                          <input type="text" name="status" value="{{ 'Diajukan' }}" hidden>
                          <input type="text" name="is_denda" value="{{ 0 }}" hidden>
                        <button type="submit" class="btn btn-warning">Setuju Pinjam</button>
                    </form>
                  @endif
                @else
                <a href="/login" class="btn btn-warning" >Pinjam Buku</a>
                @endauth
              </div>
          </div>
      </div>

  </div>
  
</div>
@endsection

<!-- Modal -->
