<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index(){
        return view('Admin.Master.Comic.index');
    }

    public function tambah(Request $request){
        return view('Admin.Master.Comic.tambah');
    }

    public function update(){

    }

}
