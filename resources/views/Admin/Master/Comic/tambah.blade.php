<!-- home.blade.php -->

@extends('Admin.layouts.layout')

@section('title', 'List Comic')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
            <form method="post" action="{{route('admin.comic.simpan')}}" enctype='multipart/form-data'>
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Comic</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name Comic">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Author</label>
                        <input name="author" type="text" class="form-control" id="name" placeholder="Author">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Synopsis Comic</label>
                        <textarea name="synopsis" type="text" class="form-control" id="name" placeholder="Synopsis.."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Released</label>
                        <input name="released" type="number" class="form-control" id="name" placeholder="Released">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Posted By</label>
                        <input name="posted_by" type="text" class="form-control" id="name" placeholder="Released" value="Comic Website">
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
                        <label for="exampleSelectRounded0">is project?</label>
                        <select name="is_project" class="custom-select rounded-0" id="exampleSelectRounded0">
                            <option value="Y">Project</option>
                            <option value="N">Mirror</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectRounded0">Comic Genre </label>
                        <select name="genre[]" id="comicGenre" class="custom-select rounded-0" id="exampleSelectRounded0" multiple>
                            @foreach ($genre as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Thumbnail</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="thumbnails">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $('#comicGenre').select2();
    });
</script>
@endsection
