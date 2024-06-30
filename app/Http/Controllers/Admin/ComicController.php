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
        $data['comic'] = Comic::with(['chapters','comicGenre'])->get();

        return view('Admin.Master.Comic.index', $data);
    }

    public function tambah(){
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
            $comic->is_project = $request->is_project;
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
        $data['data'] = Comic::with('comicGenre')->find($id);
        $data['genre'] = Genre::get();

        return view('Admin.Master.Comic.Edit', $data);
    }

    public function update(Request $request, $id){

        $data = Comic::find($id);

        $data->update([
            'name' => $request->name,
            'Author' => $request->author,
            'synopsis' => $request->synopsis,
            'released' => $request->released,
            'posted_by' => $request->posted_by,
            'type' => $request->type
        ]);

        if($request->has('genre')){
            ComicGenre::where('id_comic')->delete();

            $genre = $request->genre;
            foreach ($genre as $key => $value) {
                ComicGenre::create([
                    'id_comic' => $id,
                    'id_genre' => $genre[$key],
                    'insert_user' => Auth::user()->email,
                    'update_user' => Auth::user()->email
                ]);
            }
        }
        return redirect()->route('admin.comic');
    }

    public function check(Request $request, $id){
        $data['data'] = Comic::with('chapters')->find($id);
        return view('Admin.Master.Comic.Chapters.index' , $data);
    }

    public function delete($id){
        $var = Comic::find($id);
        $var->delete();

        if($var){
            return redirect()->route('admin.comic')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect()->route('admin.comic')->with('failed','Data Gagal Dihapus');

        }
    }

}
