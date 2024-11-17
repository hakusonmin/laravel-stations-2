<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AdminMovieController extends Controller
{
  public function adminMovies()
  {
    $movies = Movie::all();
    return view('adminMovie', ['movies' => $movies]);
  }    

  // 登録
  public function adminMoviesCreate()
  {
    return view('adminMovieCreate');
  } 

  //登録処理
  public function adminMoviesStore(Request $request)
  {
        $validated = $request->validate([
          'title' => ['required','unique:movies'],
          'image_url' => ['required', 'active_url'],
          'published_year' => 'required',
          'description' => 'required',
          'is_showing' => 'required',
      ]);

      // モデルを使用してデータをデータベースに保存
      $movies = new Movie();
      $movies->title = $validated['title'];
      $movies->image_url = $validated['image_url'];
      $movies->published_year = $validated['published_year'];
      $movies->description = $validated['description'];
      $movies->is_showing = $validated['is_showing'];
      $movies->save();

      return redirect('/')->with('success', 'お問い合わせありがとうございます！');
  }
}