<!-- home.blade.php -->

@extends('Admin.layouts.layout')

@section('title', 'List Genre')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Comic</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Comic</li>
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
                <h3 class="card-title">List genre</h3>
                {{-- <a href="{{ route('admin.genre.tambah') }}">
                    <div class="d-flex justify-content-end" style="flex-grow: 1">
                        <button class="btn btn-primary" >Add genre</button>

                    </div>
                </a> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabelGenre" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center align-middle" >No</th>
                  <th class="text-center" >Genre Name</th>
                  <th class="text-center" >Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($genre as $item)
                    <tr>
                        @php
                            $url = $item->thumbnails;
                        @endphp
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td class="flex flex-row gap-4">
                            {{-- <a href="{{ route('admin.genre.edit', $item->id) }}">
                                <button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            </a> --}}
                            {{-- <div class="flex">
                                <form method="POST" action="{{ route('admin.comic.delete', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </div> --}}
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

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script>
        $('#tabelComic').DataTable();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('failed'))
        <script>Swal.fire("{{ $message }}")</script>
    @endif

    @if ($message = Session::get('success'))
        <script>Swal.fire("{{ $message }}")</script>
    @endif

@endsection
@endsection
