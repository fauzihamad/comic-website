<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\ComicGenre;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComicController extends Controller
{
    public function index(){
        $data['comic'] = Comic::all();

        return view('Admin.Master.Comic.index', $data);
    }

    public function tambah(Request $request){
        $data['genre'] = Genre::all();
        return view('Admin.Master.Comic.tambah', $data);
    }

    public function simpan(Request $request){
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
            $comic->synopsis = $request->synopsis;
            $comic->released = $request->released;
            $comic->posted_by = $request->posted_by;
            $comic->is_complete = 'N';
            $comic->thumbnails = $nama_file;

            $comic->save();

            $genre = $request->genre;
            foreach ($genre as $key => $value) {
                ComicGenre::create([
                    'id_comic' => $comic->id,
                    'id_genre' => $genre[$key],
                    'insert_user' => Auth::user()->email,
                    'update_user' => Auth::user()->email
                ]);
            }

            if($comic){
                return redirect()->route('admin.comic');
            }
        }
    }

    public function edit($id){
        $data = Comic::find($id);
        return view('Admin.Master.Comic.Edit');
    }

    public function update(){

    }

}
