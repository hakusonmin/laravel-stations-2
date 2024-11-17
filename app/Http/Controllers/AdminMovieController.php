<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class AdminMovieController extends Controller
{
  public function adminMovies()
  {
    $movies = Movie::all();
    return view('adminMovie', ['movies' => $movies]);
  }    
}