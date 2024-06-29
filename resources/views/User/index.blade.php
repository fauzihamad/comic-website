<!-- home.blade.php -->

@extends('User.layouts.layout')

@section('title', 'Comic Website')

@section('content')
    <div class="flex gap-6 mt-6">
        <div class="w-2/3 flex flex-col gap-6">
            <div class="trending flex flex-col bg-white">
                <p class="w-full p-2 font-semibold text-[15px]">Popular Today</p>
                <hr>
                <div class="grid grid-cols-5 p-4 gap-4 w-full" style="b">
                    @foreach ($data as $item)
                        <div class="flex flex-col gap-2">
                            <a href="{{route('user.detail-comic', $item->id)}}" class="cursor-pointer">
                                <img src="{{ asset("file/$item->thumbnails") }}" alt="" class="rounded-lg">
                                <p class="text-[13.3px] font-semibold text-[#333]">{{ $item->name }}</p>
                                <p class="text-[13px] font-medium text-[#999]">Chapter 119</p>
                                <div class="flex items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <p class="ml-2 text-[13px] font-medium text-[#333]">3/5</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="trending flex flex-col bg-white">
                <p class="w-full p-2 font-semibold text-[15px]">Latest Project</p>
                <hr>
                <div class="grid grid-cols-2 p-4 gap-6">
                    @foreach ($latestComic as $item)
                        <div class="flex flex-row gap-2">
                            <img src="{{ asset("file/$item->thumbnails") }}" alt="" class="w-1/4 h-fit">
                            <div class="w-full flex flex-col gap-2">
                                <p class="text-[13.3px] font-semibold text-[#333]">{{$item->name}}</p>
                                @foreach ($item->chapters as $ch)
                                    @if ($loop->iteration != 4)
                                        <div class="flex justify-between">
                                            <p class="text-[13px] font-medium text-[#333]">{{$ch->name}}</p>
                                            <p class="text-[13px] font-medium text-[#999]">{{$ch->created_at}}</p>
                                        </div>
                                    @else
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="w-1/3">
            <div class="trending flex flex-col bg-white">
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
                            <p class="text-[13.3px] font-medium text-[#333]"> <span
                                    class="text-[13.3px] font-semibold text-[#999]">Genres :</span> Action, Martial Art,
                                Murim</p>
                        </div>
                    </div>
                    <hr class="!px-0" style="padding: 0 !important">
                </div>
            </div>
        </div>
    </div>
@endsection
