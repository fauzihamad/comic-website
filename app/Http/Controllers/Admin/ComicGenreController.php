<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class ComicGenreController extends Controller
{
    public function index(){
        $data['genre'] = Genre::get();

        return view('Admin.Master.Genre.index', $data);
    }

}
