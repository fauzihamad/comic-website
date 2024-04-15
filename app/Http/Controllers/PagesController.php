<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('User.index');
    }

    public function detail_comic(){
        return view('User.detail_comic');
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
