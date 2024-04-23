<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        $data['data'] = Comic::with('comicGenre','chapters')->get();
        // dd($data['data']);
        return view('User.index', $data);
    }

    public function detail_comic($id){
        $data['data'] = Comic::with('comicGenre','chapters')->find($id);

        return view('User.detail_comic', $data);
    }

    public function search_comic(Request $request){
        return view('User,search_comic');
    }

    public function bookmarks_comic(Request $Request){
        return view('User.bookmarks_comic');
    }

    public function all_comic(Request $request){
        return view('User.all_comic');
    }

}
