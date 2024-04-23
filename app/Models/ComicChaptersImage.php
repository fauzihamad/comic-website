<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicChaptersImage extends Model
{
    use HasFactory;

    protected $table = 'comic_chapters_image';

    protected $guarded = ['id'];

    public function chapters(){
        return $this->belongsTo(ComicChapters::class, 'id_chapters');
    }

    public function comic(){
        return $this->belongsTo(Comic::class, 'id_comic');
    }

}
