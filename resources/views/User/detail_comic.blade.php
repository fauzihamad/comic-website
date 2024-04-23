<!-- home.blade.php -->

@extends('User.layouts.layout')

@section('title', 'Comic Website')

@section('content')
    <div class="flex gap-6 mt-6">
        <div class="w-2/3 flex flex-col gap-6">
            <div class="flex flex-row bg-white shadow-md">
                <p class="w-full p-2 font-medium text-[14px]">Comic Website > {{$data->name}}</p>
            </div>

            <div class="flex flex-row bg-white p-4 gap-4">
                <div class="w-1/5 flex flex-col gap-2 items-center">
                    <img src="{{asset("file/$data->thumbnails")}}" alt="" class="rounded-md">
                    <button class="w-full bg-purple-800 text-white rounded-md px-4 py-2">
                        Bookmark
                    </button>
                    <p class="text-[12px] text-[#333] font-light">Followed by 58389 people</p>
                    <div class="w-full flex flex-row justify-between items-center bg-gray-200 rounded-md p-2">
                        <div class="flex flex-row gap-1">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p class="text-xs text-[#333] font-light">9.7</p>
                    </div>
                    <div class="w-full flex flex-row justify-between items-center bg-gray-200 rounded-md p-2">
                        <p class="text-xs text-[#333] font-light">Status</p>
                        <p class="text-xs text-[#333] font-light">{{$data->is_complete == "Y" ? "Complete" : "Ongoing"}}</p>
                    </div>
                    <div class="w-full flex flex-row justify-between items-center bg-gray-200 rounded-md p-2">
                        <p class="text-xs text-[#333] font-light">Type</p>
                        <p class="text-xs text-[#333] font-light">{{$data->type}}</p>
                    </div>
                </div>
                <div class="w-4/5 flex flex-col gap-2">
                    <p class="w-full font-semibold text-[21px]">{{$data->name}}</p>
                    <p class="w-full font-semibold text-[14px]">Synopsis {{$data->name}}</p>
                    <p class="text-md text-[#333] font-light">{{$data->synopsis}}</p>
                    <div class="grid grid-cols-2 justify-start gap-4">
                        <div>
                            <p class="w-full font-semibold text-[14px]">Released</p>
                            <p class="w-full font-medium text-[14px]">{{$data->released}}</p>
                        </div>
                        <div>
                            <p class="w-full font-semibold text-[14px]">Author</p>
                            <p class="w-full font-medium text-[14px]">{{$data->Author}}</p>
                        </div>
                        <div>
                            <p class="w-full font-semibold text-[14px]">Released</p>
                            <p class="w-full font-medium text-[14px]">-</p>
                        </div>
                        <div>
                            <p class="w-full font-semibold text-[14px]">Artist</p>
                            <p class="w-full font-medium text-[14px]">-</p>
                        </div>
                        <div>
                            <p class="w-full font-semibold text-[14px]">Serialization</p>
                            <p class="w-full font-medium text-[14px]">-</p>
                        </div>
                        <div>
                            <p class="w-full font-semibold text-[14px]">Posted By</p>
                            <p class="w-full font-medium text-[14px]">{{$data->posted_by}}</p>
                        </div>
                        <div>
                            <p class="w-full font-semibold text-[14px]">Posted On</p>
                            <p class="w-full font-medium text-[14px]">{{$data->created_at}}</p>
                        </div>
                        <div>
                            <p class="w-full font-semibold text-[14px]">Updated On</p>
                            <p class="w-full font-medium text-[14px]">{{$data->updated_at}}</p>
                        </div>
                        <div>
                            <p class="w-full font-semibold text-[14px]">Genre</p>
                            <div class="flex flex-row gap-2">
                            @foreach ($data->comicGenre as $item)
                                <button class="px-4 py-1 bg-white-100 text-purple-900 font-medium rounded-md text-nowrap" style="border: 1px solid purple">{{$item->genre->name}}</button>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col bg-white">
                <p class="w-full p-2 font-semibold text-[15px]">Chapter The Player Hides His Past
                </p>
                <hr>
                <div class="flex flex-col gap-4 p-4">
                    <div class="grid grid-cols-2 gap-2">
                        <button class="bg-[#913fe2] rounded-md flex flex-col justify-center items-center mx-auto text-white w-full py-4 text-[15px]" style="color: white">First Chapter <span class="font-bold text-[20px]">Chapter 1</span></button>
                        <button class="bg-[#913fe2] rounded-md flex flex-col justify-center items-center mx-auto text-white w-full py-4 text-[15px]" style="color: white">New Chapter <span class="font-bold text-[20px]">Chapter 50</span></button>
                    </div>

                    <input type="number" placeholder="Search Chapter. Example 25 or 178" style="    background: #fafafa;
                    border-color: #ddd;
                    color: #555;padding: 7px 10px;border: 1px solid #ececec">
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2 bg-[#ececec] rounded-md p-2">
                            <p class="text-[#333] text-sm">Chapter 50</p>
                            <p class="text-[#888] text-xs">April 11, 2024</p>
                        </div>
                        <div class="flex flex-col gap-2 bg-[#ececec] rounded-md p-2">
                            <p class="text-[#333] text-sm">Chapter 50</p>
                            <p class="text-[#888] text-xs">April 11, 2024</p>
                        </div>
                        <div class="flex flex-col gap-2 bg-[#ececec] rounded-md p-2">
                            <p class="text-[#333] text-sm">Chapter 50</p>
                            <p class="text-[#888] text-xs">April 11, 2024</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="w-1/3">
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
