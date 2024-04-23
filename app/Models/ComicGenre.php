<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComicGenre extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comic_genre';

    protected $fillable = [
        'id_comic',
        'id_genre',
        'insert_user',
        'update_user',
    ];

    public function comic(){
        return $this->belongsTo(Comic::class, 'id_comic');
    }

    public function genre(){
        return $this->belongsTo(Genre::class, 'id_genre');
    }

}
