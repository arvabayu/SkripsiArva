@extends('admin.layouts.main')

@section('main-content')
<div class="container mt-4" style="margin-bottom: 6rem">
  {{-- breadcrumb --}}
  <nav class="my-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/admin/books" class="text-decoration-none">Koleksi Buku</a></li>
      <li class="breadcrumb-item active" aria-current="page">Title</li>
    </ol>
  </nav>

  {{-- card --}}
  <div class="row">

    <!-- Cover Image -->
    <div class="col-md-3">
      <div class="card shadow mb-4">
          <div class="card-body">
            @if($data_user->cover)
          <img class="card-img-top" src="/storage/{{ $data_user->cover }}" alt="Card image cap">
          @else
          <img class="card-img-top" src="{{ asset('img/bookCoverDefault.png') }}" alt="Card image cap">
          @endif
          </div>
      </div>
    </div>

      <!-- Information -->
      <div class="col-md-9">
          <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold">Detail User</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <table>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Nama : </td>
                    <td>{{$data_user->name}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Username : </td>
                    <td>{{$data_user->username}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Email : </td>
                    <td>{{$data_user->email}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">NIS/NIP : </td>
                    <td>{{$data_user->nis_nip}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">No.Telp : </td>
                    <td>{{$data_user->notel}}</td>
                  </tr>
                  <tr class="d-flex gap-4">
                    <td class="fw-medium">Role : </td>
                    <td>{{$data_user->role}}</td>
                  </tr>
                </table>
              </div>

              {{-- proses --}}
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold">Aksi</h6>
              </div>
              <div class="card-body d-flex align-items-start gap-2">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $data_user->id }}"><i class="bi bi-pencil-square"></i> Edit</button>
                <form action="{{ route('admin-user.destroy',$data_user->id)  }}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger"><i class="bi bi-x-circle"></i> Delete</button>
                </form>
              </td>
              </div>
          </div>
      </div>

  </div>
  
</div>
@endsection

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit{{ $data_user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('admin-user.update',$data_user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
              <div class="mb-3">
                <label for="name" class="form-label">Nama <small>(minimal 3 karakter)</small></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data_user->name }}">
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username <small>(minimal 5 karakter)</small></label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $data_user->username }}">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email <small>(minimal 5 karakter)</small></label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $data_user->email }}">
              </div>
              <div class="mb-3">
                <label for="nis_nip" class="form-label">NIS/NIP <small>(minimal 5 karakter)</small></label>
                <input type="text" class="form-control" id="nis_nip" name="nis_nip" value="{{ $data_user->nis_nip }}">
              </div>
              <div class="mb-3">
                <label for="notel" class="form-label">No.Telp <small>(minimal 5 karakter)</small></label>
                <input type="text" class="form-control" id="notel" name="notel" value="{{ $data_user->notel }}">
              </div>
              <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role">
                  <option value="admin"{{ $data_user->role == 'admin' ? 'selected' : '' }}>admin</option>
                  <option value="user"{{ $data_user->role == 'user' ? 'selected' : '' }}>user</option>
                </select>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
</div>