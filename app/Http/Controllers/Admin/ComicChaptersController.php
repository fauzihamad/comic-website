<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComicChapters;
use App\Models\ComicChaptersImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class ComicChaptersController extends Controller
{
    public function simpan(Request $request,$id){
        $validated = $request->validate([
            'name' => 'required'
        ]);

        if($validated){
            $comic = new ComicChapters();
            $comic->id_comic = $id;
            $comic->name = $request->name;
            $comic->insert_user = Auth::user()->email;
            $comic->update_user = Auth::user()->email;

            $comic->save();

            if($comic){
                return redirect()->route('admin.comic.check', $id);
            }
        }
    }

    public function check($id){

        $data['data'] = ComicChapters::with(['comicChaptersImage','comic'])->find($id);

        return view('Admin.Master.Comic.Chapters.check', $data);
    }

    public function simpan_gambar(Request $request,$id){
        ComicChaptersImage::where('id_chapters',$id)->delete();
        $data = ComicChapters::find($id);
        // dd($request->all());

        $file = $request->file;

        foreach ($file as $key => $value) {
            $namaFile = time() . $value->getClientOriginalName();
            $value->move('file', $namaFile);

            ComicChaptersImage::create([
                'id_comic' => $data->id_comic,
                'id_chapters' => $id,
                'file' => $namaFile,
                'insert_user' => Auth::user()->email,
                'update_user' => Auth::user()->email
            ]);
        }

        return redirect()->route('admin.comic.chapters.check', $id);
    }

    public function delete($id){
        $var = ComicChapters::find($id);
        $idComic = $var->id_comic;
        $var->delete();

        if($var){
            return redirect()->route('admin.comic.check',$idComic)->with('success','Data Berhasil Dihapus');
        }else{
            return redirect()->route('admin.comic.check',$idComic)->with('failed','Data Gagal Dihapus');

        }
    }

    public function update(Request $request,$id){
        $var = ComicChapters::find($id);
        $idComic = $var->id_comic;

        $var->update([
            'name' => $request->name,
        ]);

        if($var){
            return redirect()->route('admin.comic.check',$idComic)->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->route('admin.comic.check',$idComic)->with('failed','Data Gagal Diubah');

        }
    }
}
