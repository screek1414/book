<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
      'litres_link',
      'labirint_link',
      'chitai_link'
    ];

    public function genre()
    {
        $this->hasOne('app/Book', 'main_category', 'id');
    }

    public function getGenreAttribute()
    {
        //
    }
}
