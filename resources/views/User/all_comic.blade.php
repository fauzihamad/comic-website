<!-- home.blade.php -->

@extends('User.layouts.layout')

@section('title', 'Comic Website')

@section('content')
    <div class="flex flex-col lg:flex-row gap-6 mt-6 lg:mx-64">
        <div class="w-full lg:w-2/3 flex flex-col gap-6">

            <div class="flex flex-col bg-white">
                <p class="w-full p-2 font-semibold text-[15px]">Manga Lists</p>
                <hr>
                <div class="grid grid-cols-2 md:grid-cols-5 bg-white p-4 gap-4">
                    @foreach ($latestComic as $item)

                    <div class="flex flex-col gap-2">
                        <a href="#" class="cursor-pointer">
                            <a href="{{route('user.detail-comic', $item->id)}}">
                                <img src="{{ asset("file/$item->thumbnails") }}" alt="" class="rounded-lg">
                            </a>
                            @if (isset($item->chapters) && count($item->chapters) > 0)
                                <a href="{{route('user.detail-chapters', ["idComic" => $item->id,"id"=>$item->chapters[0]->id])}}">
                                    <p class="text-[13.3px] font-semibold text-[#333]">{{$item->name}}</p>
                                </a>
                                <p class="text-[13px] font-medium text-[#999]">{{$item->chapters[0]->name}}</p>
                                <div class="flex items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <p class="ml-2 text-[13px] font-medium text-[#333]">3/5</p>
                                </div>
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>


        </div>
        <div class="w-full lg:w-1/3">
            <div class="flex flex-col bg-white">
                <p class="w-full p-2 font-semibold text-[15px]">Popular</p>
                <hr>
                <div class="flex flex-col p-4 gap-4">
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="w-[14px] h-[14px] flex justify-center items-center">1</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%] rounded-md">
                        <div class="flex flex-col self-start">
                            <p class="text-[13.3px] font-semibold text-[#333]">Return Mount Hua Sect</p>
                            <p class="text-[13.3px] font-medium text-[#333]"> <span class="text-[13.3px] font-semibold text-[#999]">Genres :</span>  Action, Martial Art, Murim</p>
                        </div>
                    </div>
                    <hr class="!px-0" style="padding: 0 !important">
                </div>
            </div>
        </div>
    </div>
@endsection
