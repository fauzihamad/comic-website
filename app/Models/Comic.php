<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comic';

    protected $guarded = ['id'];

    public function comicGenre(){
        return $this->hasMany(ComicGenre::class, 'id_comic');
    }

    public function chapters(){
        return $this->hasMany(ComicChapters::class, 'id_comic');
    }

}
