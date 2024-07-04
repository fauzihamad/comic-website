<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\ComicChapters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {
        $data['popularToday'] = Comic::with('comicGenre', 'chapters')
        ->select('comic.*')
        ->leftJoin('comic_chapters', 'comic.id', '=', 'comic_chapters.id_comic')
        ->groupBy('comic.id')
        ->orderByRaw('MAX(comic_chapters.views) DESC')
        ->limit(10)
        ->get();

        $data['latestComic'] = Comic::with(['comicGenre', 'chapters' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->withCount(['chapters as latest_chapter_created_at' => function ($query) {
            $query->select(DB::raw('MAX(created_at)'));
        }])
        ->orderBy('latest_chapter_created_at', 'desc')
        ->where('is_project','Y')
        ->limit(6)
        ->get();

        $data['latestUpdate'] = Comic::with(['comicGenre', 'chapters' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->withCount(['chapters as latest_chapter_created_at' => function ($query) {
            $query->select(DB::raw('MAX(created_at)'));
        }])
        ->orderBy('latest_chapter_created_at', 'desc')
        ->paginate(6);

        return view('User.index', $data);
    }

    public function detail_comic($id){
        $data['data'] = Comic::with('comicGenre','chapters')->find($id);

        return view('User.detail_comic', $data);
    }

    public function detail_chapters($idComic, $id) {
        // Fetch the current chapter with related images and comic
        $chapter = ComicChapters::with('comicChaptersImage', 'comic')->find($id);

        // Fetch all chapters for the comic and sort by created_at
        $chapters = $chapter->comic->chapters->sortBy('created_at')->values();

        // Initialize previous and next chapters
        $prevChapter = null;
        $nextChapter = null;

        // Determine the position of the current chapter and find prev and next chapters
        foreach ($chapters as $index => $chap) {
            if ($chap->id == $id) {
                $prevChapter = $index > 0 ? $chapters[$index - 1] : null;
                $nextChapter = $index < count($chapters) - 1 ? $chapters[$index + 1] : null;
                break;
            }
        }

        // Pass the necessary data to the view
        return view('User.detail_chapters', [
            'data' => $chapter,
            'idComic' => $idComic,
            'id' => $id,
            'prevChapter' => $prevChapter,
            'nextChapter' => $nextChapter
        ]);
    }

    public function search_comic(Request $request){
        return view('User,search_comic');
    }

    public function bookmarks_comic(Request $Request){
        return view('User.bookmarks_comic');
    }

    public function all_comic(Request $request){

        $data['latestComic'] = Comic::with(['comicGenre', 'chapters' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->withCount(['chapters as latest_chapter_created_at' => function ($query) {
            $query->select(DB::raw('MAX(created_at)'));
        }])
        ->orderBy('latest_chapter_created_at', 'desc');

        if($request->has('reqtype')){
            if($request->reqtype == "project"){
                $data['latestComic'] = $data['latestComic']->where('is_project','Y');
            }else{
                $data['latestComic'] = $data['latestComic']->where('is_project','N');
            }
        }
        $data['latestComic'] = $data['latestComic']->get();

        return view('User.all_comic', $data);
    }

}
