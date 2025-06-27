@extends('admin.layouts.main')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <style>
      @media print{
        .table thead tr th:last-child{
          display: none !important;
        }
        .table tbody tr td:last-child{
          display: none !important;
        }
      }
    </style>
@endsection

@section('main-content')
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar User</h1>
    <!-- Button trigger modal -->
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCreate">
      Tambah User
    </button>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>No.</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>NIS/NIP</th>
                          <th>No.Telp</th>
                          <th>Role</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($data_user as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->nis_nip }}</td>
                        <td>{{ $data->notel }}</td>
                        <td>{{ $data->role }}</td>
                        <td class="d-flex flex-row align-items-start gap-1">
                          <a href="{{route('admin-user.show',$data->id)}}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-id="{{ $data->id }} data-bs-target="#modalEdit"><i class="bi bi-pencil-square"></i>
                          </button>
                          <form action="{{ route('admin-user.destroy',$data->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                          </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                   
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>

</div>
@endsection

@section('script')
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script> --}}
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script>
      // let table = new DataTable('#myTable');

      $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            // 'pdf',
            // 'excel',
            'print'
        ]
      } );
    </script>
@endsection

<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('admin-user.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama <small>(minimal 3 karakter)</small></label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username <small>(minimal 5 karakter)</small></label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email <small>(minimal 5 karakter)</small></label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="nis_nip" class="form-label">NIS/NIP <small>(minimal 5 karakter)</small></label>
            <input type="number" class="form-control" id="nis_nip" name="nis_nip" required>
          </div>
          <div class="mb-3">
            <label for="notel" class="form-label">No.Telepon <small>(minimal 5 karakter)</small></label>
            <input type="number" class="form-control" id="notel" name="notel" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password <small>(minimal 5 karakter)</small></label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Kategori</label>
            <select class="form-select" id="role" name="role" required>
              <option value="admin">Admin</option>
              <option value="librarian">Librarian</option>
              <option value="user">User</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </div>
    </form>
    </div>
</div>
<!-- --Model Edit-- -->
 
