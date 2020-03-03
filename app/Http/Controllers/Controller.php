<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function back()
    {
        return redirect()->back();
    }

    public function information()
    {
        return response()->json([
            'genres' => $this->genres()->toArray(),
        ]);
    }

    public function genres()
    {
        $genres = Genre::inRandomOrder()
            ->limit('7')
            ->pluck('genre', 'id');
        return $genres;
    }
}
