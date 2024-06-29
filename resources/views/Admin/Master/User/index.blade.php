<!-- home.blade.php -->

@extends('Admin.layouts.layout')

@section('title', 'List User')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between" style="width: 100%;">
                <h3 class="card-title">List User</h3>
                <div class="d-flex justify-content-end" style="flex-grow: 1" id="addUsers">
                    <button class="btn btn-primary" >Add User</button>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabelGenre" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center align-middle" >No</th>
                  <th class="text-center" >Name</th>
                  <th class="text-center" >Email</th>
                  <th class="text-center" >Role</th>
                  <th class="text-center" >Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        {{-- <td>{{$item->hasRole('super admin')}}</td> --}}
                        <td class="flex flex-row gap-4">
                            {{-- <a href="{{ route('admin.users.edit', $item->id) }}">
                                <button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            </a> --}}
                            <div class="flex">
                                <form method="POST" action="{{ route('admin.users.delete', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </td>
                      </tr>
                    @endforeach

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modal-default">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{route('admin.users.simpan')}}" method="post" id="modal-form">
        @csrf
        <input type="hidden" name="_method" id="form-method" value="POST">
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input  type="text" name="name" class="form-control" id="nameUser" placeholder="Name User" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input  type="text" name="email" class="form-control" id="emailUser" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input  type="password" name="password" class="form-control" id="passUser" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Role</label>
                <select name="role" id="" class="form-control">
                    @foreach ($role as $item)
                        <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="modal-save-button">Simpan</button>
        </div>
    </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script>
        $('#tabelComic').DataTable();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $('#addUsers').click(function() {
            $('.modal-title').text('Add User');
            $('#form-method').val('POST');
            $('#nameUser').val('');
            $('#emailUser').val('');
            $('#passUser').val('');
            $('#modal-form').attr('action', '{{ route('admin.users.simpan') }}');
            $('#modal-save-button').text('Simpan');
            $('#modal-default').modal('show');
        });
    </script>
    @if ($message = Session::get('failed'))
        <script>Swal.fire("{{ $message }}")</script>
    @endif

    @if ($message = Session::get('success'))
        <script>Swal.fire("{{ $message }}")</script>
    @endif

@endsection
@endsection
