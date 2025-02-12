<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieService;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index(Request $request)
    {
        $selectedGenre = $request->query('genre', '');

        $genres = $this->movieService->getGenres();
        $movies = $this->movieService->getPopularMovies($selectedGenre);

        return view('movies', compact('movies', 'genres', 'selectedGenre'));
    }
}