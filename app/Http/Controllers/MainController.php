<?php

namespace App\Http\Controllers;

use App\Genre;

class MainController extends Controller
{
    /**
     * @return mixed
     */
    public function getGenres()
    {
        return response()->json([
            'genres' => Genre::inRandomOrder()->limit('7')->pluck('genre', 'id')->toArray()
        ]);
    }
}
