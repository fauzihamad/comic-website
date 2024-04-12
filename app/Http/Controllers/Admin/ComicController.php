<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index(){
        $data['comic'] = Comic::all();

        return view('Admin.Master.Comic.index', $data);
    }

    public function tambah(Request $request){
        return view('Admin.Master.Comic.tambah');
    }

    public function simpan(Request $request){
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'thumbnails' => 'required',
            'type' => 'required'
        ]);

        if ($request->thumbnails) {
            $file = $request->thumbnails;
            $nama_file = time() . $file->getClientOriginalName();
            $file->move('file', $nama_file);
        }

        if($validated){
            $comic = new Comic();
            $comic->name = $request->name;
            $comic->author = $request->author;
            $comic->type = $request->type;
            $comic->thumbnails = $nama_file;

            $comic->save();

            if($comic){
                return redirect()->route('admin.comic');
            }
        }
    }
    public function update(){

    }

}
