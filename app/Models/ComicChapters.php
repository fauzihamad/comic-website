<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComicChapters extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comic_chapters';

    protected $guarded = ['id'];

    public function comic(){
        return $this->belongsTo(Comic::class, 'id_comic');
    }

    public function comicChaptersImage(){
        return $this->hasMany(ComicChaptersImage::class, 'id_chapters');
    }

}
