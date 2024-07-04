<!-- home.blade.php -->

@extends('User.layouts.layout')

@section('title', 'Comic Website')

<style>
    nav p {
        display: none;
    }
</style>

@section('content')
    <div class="flex flex-col lg:flex-row gap-6 mt-6 lg:mx-64">
        <div class="w-full lg:w-2/3 flex flex-col gap-6">
            <div class="trending flex flex-col bg-white">
                <p class="w-full p-2 font-semibold text-[15px]">Popular Today</p>
                <hr>
                <div class="grid grid-cols-2 md:grid-cols-5 p-4 gap-4 w-full" style="b">
                    @foreach ($popularToday as $item)
                        @if (isset($item->chapters) && count($item->chapters) > 0)

                        <div class="flex flex-col gap-2">
                            <a href="{{route('user.detail-comic', $item->id)}}" class="cursor-pointer">
                                <img src="{{ asset("file/$item->thumbnails") }}" alt="" class="rounded-lg">
                                <p class="text-[13.3px] font-semibold text-[#333]">{{ $item->name }}</p>

                                <p class="text-[13px] font-medium text-[#999]"> {{ $item->chapters[count($item->chapters) - 1]->name }}</p>
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
                        @endif

                    @endforeach
                </div>
            </div>

            <div class="trending flex flex-col bg-white">
                <div class="flex justify-between">
                    <p class="w-full p-2 font-semibold text-[15px]">Latest Project</p>
                    <button class="w-fit text-nowrap bg-[#913fe2] text-xs text-white font-medium rounded-md px-2 my-1 mr-2">
                        <a href="{{route('user.all-comic')}}">view all</a>
                    </button>
                </div>
                <hr>
                <div class="grid grid-cols-1 md:grid-cols-2 p-4 gap-6">
                    @foreach ($latestComic as $item)
                        <div class="flex flex-row gap-2">
                            <a href="{{route('user.detail-comic', $item->id)}}" class="w-1/4 h-fit">
                                <img src="{{ asset("file/$item->thumbnails") }}" alt="" class="">
                            </a>

                            <div class="w-full flex flex-col gap-2">
                                <p class="text-[13.3px] font-semibold text-[#333]">{{$item->name}}</p>
                                @foreach ($item->chapters as $ch)
                                    @if ($loop->iteration != 4)
                                        <div class="flex justify-between">
                                            <a href="{{route('user.detail-chapters', ["idComic" => $item->id,"id"=>$ch->id])}}">
                                                <p class="text-[13px] font-medium text-[#333]">{{$ch->name}}</p>
                                            </a>
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

            <div class="trending flex flex-col bg-white">
                <p class="w-full p-2 font-semibold text-[15px]">Latest Update</p>
                <hr>
                <div class="grid grid-cols-1 md:grid-cols-2 p-4 gap-6">
                    @foreach ($latestUpdate as $item)
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
                    <div class="self-center py-4">
                        {{$latestUpdate->links()}}
                    </div>
            </div>

        </div>
        <div class="w-full lg:w-1/3">
            <div class="trending flex flex-col bg-white">
                <p class="w-full p-2 font-semibold text-[15px]">Popular</p>
                <hr>
                <div class="flex flex-col p-4 gap-4">
                    @foreach ($popularToday as $item)
                        <div class="flex flex-row gap-4 items-center">
                            <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                                style="border: 1px solid black">
                                <p class="w-[14px] h-[14px] flex justify-center items-center">{{$loop->iteration}}</p>
                            </div>
                            <img src="{{ asset("file/$item->thumbnails") }}" alt="" class="w-[14%] rounded-md">
                            <div class="flex flex-col self-start">
                                <p class="text-[13.3px] font-semibold text-[#333]">{{$item->name}}</p>
                                <p class="text-[13.3px] font-medium text-[#333]"> <span
                                        class="text-[13.3px] font-semibold text-[#999]">Genres :</span>
                                    @foreach ($item->comicGenre as $item2)
                                        {{$item2->genre->name}}{{$item2->genre->name == $item->comicGenre[count($item->comicGenre)-1]->genre->name ? "":","}}
                                    @endforeach
                                    </p>
                            </div>
                        </div>
                        <hr class="!px-0" style="padding: 0 !important">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
