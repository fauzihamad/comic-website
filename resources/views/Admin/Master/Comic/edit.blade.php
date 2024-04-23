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
                <h3 class="card-title">Form Edit Comic</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{route('admin.comic.update', $data->id)}}" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Comic</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name Comic" value="{{$data->name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Author</label>
                        <input name="author" type="text" class="form-control" id="name" placeholder="Author" value="{{$data->Author}}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Synopsis Comic</label>
                        <textarea name="synopsis" type="text" class="form-control" id="name" placeholder="Synopsis.." required>{{$data->synopsis}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Released</label>
                        <input name="released" type="number" class="form-control" id="name" placeholder="Released" value="{{$data->released}}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Posted By</label>
                        <input name="posted_by" type="text" class="form-control" id="name" placeholder="Released" value="{{$data->posted_by}}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectRounded0">Type Comic </label>
                        <select name="type" class="custom-select rounded-0" id="exampleSelectRounded0" required>
                            <option {{$data->type == "Manhwa" ? "checked" : ""}}>Manhwa</option>
                            <option {{$data->type == "Manhua" ? "checked" : ""}}>Manhua</option>
                            <option {{$data->type == "Manga" ? "checked" : ""}}>Manga</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectRounded0">Comic Genre </label>
                        <select name="genre[]" id="comicGenre" class="custom-select rounded-0" id="exampleSelectRounded0" multiple required>
                            @foreach ($genre as $item)
                            @php
                                $checked = ""; // Reset $checked for each iteration
                            @endphp
                            @foreach ($data->comicGenre as $cg)
                                @if ($cg->id_genre == $item->id)
                                    @php
                                        $checked = "selected"; // Use "selected" instead of "checked" for <option> tags
                                        break;
                                    @endphp
                                @endif
                            @endforeach
                            <option value="{{$item->id}}" {{$checked}}>{{$item->name}}</option>
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
                        </div>
                        @php
                            $fileName = $data->thumbnails;
                        @endphp
                        <p>Current Thumnails : <a href="{{asset("file/$data->thumbnails")}}" target="_blank">Link</a></p>
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
