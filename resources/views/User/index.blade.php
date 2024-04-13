<!-- home.blade.php -->

@extends('User.layouts.layout')

@section('title', 'Comic Website')

@section('content')
    <div class="flex gap-6 mt-6">
        <div class="w-2/3 flex flex-col gap-6">
            <div class="trending flex flex-col bg-white">
                <p class="w-full p-2">Popular Today</p>
                <hr>
                <div class="grid grid-cols-5 p-4 gap-2">
                    <div class="flex flex-col gap-1">
                        <a href="#" class="cursor-pointer">
                            <img src="{{ asset('img/cover.jpg') }}" alt="" class="rounded-lg">
                            <p>Return Mount Hua Sect</p>
                            <p>Chapter 119</p>
                            <div class="flex items-center">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <p class="ml-2">3/5</p>
                            </div>
                        </a>
                    </div>
                    <div class="flex flex-col gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="">
                        <p>Return Mount Hua Sect</p>
                        <p>Chapter 119</p>
                    </div>
                    <div class="flex flex-col gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="">
                        <p>Return Mount Hua Sect</p>
                        <p>Chapter 119</p>
                    </div>
                    <div class="flex flex-col gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="">
                        <p>Return Mount Hua Sect</p>
                        <p>Chapter 119</p>
                    </div>
                    <div class="flex flex-col gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="">
                        <p>Return Mount Hua Sect</p>
                        <p>Chapter 119</p>
                    </div>
                </div>
            </div>

            <div class="trending flex flex-col bg-white">
                <p class="w-full p-2">Latest Project</p>
                <hr>
                <div class="grid grid-cols-2 p-4 gap-6">
                    <div class="flex flex-row gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-1/4 h-fit">
                        <div class="w-full">
                            <p>Return Mount Hua Sect</p>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-1/4 h-fit">
                        <div class="w-full">
                            <p>Return Mount Hua Sect</p>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-1/4 h-fit">
                        <div class="w-full">
                            <p>Return Mount Hua Sect</p>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-1/4 h-fit">
                        <div class="w-full">
                            <p>Return Mount Hua Sect</p>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-1/4 h-fit">
                        <div class="w-full">
                            <p>Return Mount Hua Sect</p>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-1/4 h-fit">
                        <div class="w-full">
                            <p>Return Mount Hua Sect</p>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-1/4 h-fit">
                        <div class="w-full">
                            <p>Return Mount Hua Sect</p>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-1">
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-1/4 h-fit">
                        <div class="w-full">
                            <p>Return Mount Hua Sect</p>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Chapter 119</p>
                                <p>8 Hour Ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="w-1/3">
            <div class="trending flex flex-col bg-white">
                <p class="w-full p-2">Popular</p>
                <hr>
                <div class="flex flex-col p-4 gap-4">
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="">1</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%]">
                        <div class="flex flex-col self-start">
                            <p>Return Mount Hua Sect</p>
                            <p>Genres : Action, Martial Art, Murim</p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="">2</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%]">
                        <div class="flex flex-col self-start">
                            <p>Return Mount Hua Sect</p>
                            <p>Genres : Action, Martial Art, Murim</p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="">3</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%]">
                        <div class="flex flex-col self-start">
                            <p>Return Mount Hua Sect</p>
                            <p>Genres : Action, Martial Art, Murim</p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="">4</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%]">
                        <div class="flex flex-col self-start">
                            <p>Return Mount Hua Sect</p>
                            <p>Genres : Action, Martial Art, Murim</p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="">5</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%]">
                        <div class="flex flex-col self-start">
                            <p>Return Mount Hua Sect</p>
                            <p>Genres : Action, Martial Art, Murim</p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="">6</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%]">
                        <div class="flex flex-col self-start">
                            <p>Return Mount Hua Sect</p>
                            <p>Genres : Action, Martial Art, Murim</p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="">7</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%]">
                        <div class="flex flex-col self-start">
                            <p>Return Mount Hua Sect</p>
                            <p>Genres : Action, Martial Art, Murim</p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="">8</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%]">
                        <div class="flex flex-col self-start">
                            <p>Return Mount Hua Sect</p>
                            <p>Genres : Action, Martial Art, Murim</p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 items-center">
                        <div class="p-2 flex items-center justify-center border-black-500 border-1 rounded-md"
                            style="border: 1px solid black">
                            <p class="">9</p>
                        </div>
                        <img src="{{ asset('img/cover.jpg') }}" alt="" class="w-[14%]">
                        <div class="flex flex-col self-start">
                            <p>Return Mount Hua Sect</p>
                            <p>Genres : Action, Martial Art, Murim</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
