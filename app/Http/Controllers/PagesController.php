<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\ComicChapters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {
        $data['data'] = Comic::with('comicGenre', 'chapters')->get();

        $data['latestComic'] = Comic::with(['comicGenre', 'chapters' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->withCount(['chapters as latest_chapter_created_at' => function ($query) {
            $query->select(DB::raw('MAX(created_at)'));
        }])
        ->orderBy('latest_chapter_created_at', 'desc')
        ->get();

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
        return view('User.all_comic');
    }

}
