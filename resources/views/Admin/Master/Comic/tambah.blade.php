<!-- home.blade.php -->

@extends('Admin.layouts.layout')

@section('title', 'List Comic')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Comic</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.comic') }}">Comic</a></li>
                <li class="breadcrumb-item active">Tambah Comic</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Comic</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Comic</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name Comic">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Author</label>
                        <input name="author" type="text" name="name" class="form-control" id="name" placeholder="Enter Name Comic">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Type Comic </label>
                        <select name="type" class="custom-select rounded-0" id="exampleSelectRounded0">
                            <option>Manhwa</option>
                            <option>Manhua</option>
                            <option>Manga</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Thumbnail</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>        

    </div>

</div>
@endsection
