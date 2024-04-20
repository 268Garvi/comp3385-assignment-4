<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return response()->json(['movies' => $movies]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'poster' => 'required|image'
        ]);

        $path = $request->file('poster')->storeAs('posters', 'public');
        $movie = new Movie([
            'title' => $request->title,
            'description' => $request->description,
            'poster' => $path
        ]);
        $movie->save();

        return response()->json(['message' => 'Movie created successfully', 'movie' => $movie]);
    }
}
