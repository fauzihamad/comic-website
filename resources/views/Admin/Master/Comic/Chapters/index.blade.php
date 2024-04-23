<!-- home.blade.php -->

@extends('Admin.layouts.layout')

@section('title', 'List Comic')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Chapters {{$data->name}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.comic') }}"></a> Comic</li>
            <li class="breadcrumb-item active">{{$data->name}}</li>
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
                <h3 class="card-title">List Chapters {{$data->name}}</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add Chapters</button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabelChapters" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center align-middle" >No</th>
                  <th class="text-center" >Nama Comic</th>
                  <th class="text-center" >Judul Chapters</th>
                  <th class="text-center" >Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data->chapters as $item)
                        <tr>
                            <td class="text-center align-middle">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->name}}</td>
                            <td class="text-center">{{$item->name}}</td>
                            <td class="flex flex-row gap-4">
                                <a href="{{route('admin.comic.chapters.check', $item->id)}}">
                                    <button>Check</button>
                                </a>
                                <a href="{{route('admin.comic.chapters.edit', $item->id)}}">
                                    <button>Edit</button>
                                </a>
                                <a href="{{route('admin.comic.chapters.delete', $item->id)}}">
                                    <button>Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.comic.chapters.simpan', $data->id)}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Chapters</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Judul Chapters" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
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
        $('#tabelChapters').DataTable();
    </script>

@endsection
@endsection
