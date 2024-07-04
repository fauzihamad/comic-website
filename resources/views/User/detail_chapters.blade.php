<!-- home.blade.php -->

@extends('User.layouts.layout')

@section('title', 'Comic Website')

@section('content')
<div class="flex flex-col items-center w-full mt-8 lg:mx-64">

    <h1 class="font-bold text-[21px]">{{$data->comic->name}}</h1>
    <p>All Chapters are in <a href="{{route('user.detail-comic',$data->comic->id)}}">{{$data->comic->name}}</a></p>
    <p class="w-full bg-gray-700 mt-4 shadow-lg text-center text-white flex items-center py-2 justify-center rounded-md">
        <a href="{{route('user.index')}}">Comic Website</a> > <a href="{{route('user.detail-comic',$data->comic->id)}}">{{$data->comic->name}}</a> > {{$data->comic->name}} {{$data->name}}
    </p>

    <div class="flex w-full justify-between mt-4">
        <select name="chapters" id="chapters">
            @foreach ($data->comic->chapters as $item)
                <option value="{{$item->id}}" {{$id == $item->id ? "selected" : ""}}>{{$item->name}}</option>
            @endforeach
        </select>

        <div class="flex gap-4">
            @if ($prevChapter)
                <a href="{{route('user.detail-chapters', ['idComic' => $data->comic->id, 'id' => $prevChapter->id])}}" class="bg-purple-700 rounded-lg px-8 py-1 text-white font-medium">Prev</a>
            @else
                <button class="bg-gray-500 rounded-lg px-8 py-1 text-white font-medium" disabled>Prev</button>
            @endif

            @if ($nextChapter)
                <a href="{{route('user.detail-chapters', ['idComic' => $data->comic->id, 'id' => $nextChapter->id])}}" class="bg-purple-700 rounded-lg px-8 py-1 text-white font-medium">Next</a>
            @else
                <button class="bg-gray-500 rounded-lg px-8 py-1 text-white font-medium" disabled>Next</button>
            @endif
        </div>
    </div>

    <div class="mt-6 w-full flex flex-col justify-center items-center">
        @foreach ($data->comicChaptersImage as $item)
            <img src="{{asset("file/$item->file")}}" alt="" class="w-fit">
        @endforeach
    </div>
</div>

<script>

    let idComic = "{{$idComic}}";
    console.log(idComic);
    $('#chapters').change(function() {
        window.location.href = `http://localhost:8000/${idComic}/detail-chapters/${$("#chapters").val()}`;
    });
</script>
@endsection
