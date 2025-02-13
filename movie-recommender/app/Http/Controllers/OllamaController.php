<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OllamaService;

class OllamaController extends Controller
{
    protected $ollamaService;

    public function __construct(OllamaService $ollamaService)
    {
        $this->ollamaService = $ollamaService;
    }

    public function showRandomMovie()
    {
        $prompt = "Why is the sky blue?";

        $movie = $this->ollamaService->getRandomMovie($prompt);

        var_dump($movie);

        return view('movierandom', compact('movie'));
    }
}
