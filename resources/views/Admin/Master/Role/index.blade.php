<!-- home.blade.php -->

@extends('Admin.layouts.layout')

@section('title', 'List Role')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Role</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Role</li>
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
                <h3 class="card-title">List Role</h3>
                <div class="d-flex justify-content-end" style="flex-grow: 1" id="addRole">
                    <button class="btn btn-primary" >Add Role</button>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabelGenre" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center align-middle" >No</th>
                  <th class="text-center" >Name</th>
                  <th class="text-center" >Guard Name</th>
                  <th class="text-center" >Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($role as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->guard_name}}</td>

                        <td class="flex flex-row gap-4">
                            <button class="editRole btn btn-warning" nameRole={{$item->name}} idRole = {{$item->guard_name}}><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            <div class="flex">
                                <form method="POST" action="{{ route('admin.role.delete', $item->id) }}">
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
        <h4 class="modal-title">Add Role</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{route('admin.role.simpan')}}" method="post" id="modal-form">
        @csrf
        <input type="hidden" name="_method" id="form-method" value="POST">
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input  type="text" name="name" class="form-control" id="namaRole" placeholder="Name Role" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Guard</label>
                <input  type="text" name="guard" class="form-control" id="emailUser" placeholder="Guard" value="web" readonly>
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
        $('#addRole').click(function() {
            $('.modal-title').text('Add Role');
            $('#form-method').val('POST');
            $('#namaRole').val('');
            $('#modal-form').attr('action', '{{ route('admin.role.simpan') }}');
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
