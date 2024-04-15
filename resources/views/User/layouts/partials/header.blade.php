<div class="flex justify-between items-center px-64 bg-white shadow-lg py-2">
    <img src="{{ asset('img/logo.png') }}" alt="" class="w-20">
</div>
<div class="bg-[#223ccf] flex justify-between items-center px-64 py-4">
    <div class="flex flex-row gap-8">
        <a href="{{route('user.index')}}">
            <p class="text-white text-md font-bold">Home</p>
        </a>
        <a href="{{route('user.all-comic')}}">
            <p class="text-white text-md font-bold">Comic</p>
        </a>
        <a href="{{route('user.bookmarks-comic')}}">
            <p class="text-white text-md font-bold">Bookmarks</p>
        </a>

    </div>
</div>
