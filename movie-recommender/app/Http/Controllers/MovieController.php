<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDbService;

class MovieController extends Controller
{
    protected $tmdbService;

    public function __construct(TMDbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index(Request $request)
    {
        $rating = $request->query('rating', 7);
        $movies = $this->tmdbService->getMoviesByRating($rating);

        return response()->json($movies);
    }
}
