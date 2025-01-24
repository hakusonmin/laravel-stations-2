<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMovieController extends Controller
{
  public function index()
  {
    $movies = Movie::with('genre')->get();
    return view('admin.movie.index', compact('movies'));
  }    

  // 登録
  public function create()
  {
    return view('admin.movie.create');
  } 

  //登録処理
  public function store(Request $request)
  {
        $validated = $request->validate([
          'title' => ['required','unique:movies'],
          'image_url' => ['required', 'active_url'],
          'published_year' => 'required',
          'description' => 'required',
          'is_showing' => 'required',
          'genre' => 'required',
      ]);
    DB::transaction(function () use ($validated) {

      $genreId = $validated['genre']
            ? Genre::firstOrCreate(['name' => trim($validated['genre'])])->id
            : null;

      // モデルを使用してデータをデータベースに保存
      $movies = new Movie();
      $movies->title = $validated['title'];
      $movies->image_url = $validated['image_url'];
      $movies->published_year = $validated['published_year'];
      $movies->description = $validated['description'];
      $movies->is_showing = $validated['is_showing'];
      $movies->genre_id = $genreId;
      $movies->save();
    });

      return redirect()->route('admin.movie.index');
  }

  public function show($id)
    {
        $movie = Movie::find($id);

        return view('admin.movie.show', compact('movie'));
    }

  /**
     * 編集画面の表示
     */
    public function edit($id)
    {
        $movie = Movie::find($id);

        return view('admin.movie.edit', compact('movie'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, $id)
    {
      $validated = $request->validate([
        'title' => ['required','unique:movies'],
        'image_url' => ['required', 'active_url'],
        'published_year' => 'required',
        'description' => 'required',
        'is_showing' => 'required',
        'genre' => 'required',
    ]);

    DB::transaction(function () use ($validated, $id) {
      
        $genreId = $validated['genre']
            ? Genre::firstOrCreate(['name' => trim($validated['genre'])])->id
            : null;

        $movies = Movie::find($id);
        $movies->title = $validated['title'];
        $movies->image_url = $validated['image_url'];
        $movies->published_year = $validated['published_year'];
        $movies->description = $validated['description'];
        $movies->is_showing = $validated['is_showing'] == 'true' ? 1 : 0;
        $movies->genre_id = $genreId;
        $movies->save();
    });
        
        return redirect()->route('admin.movie.index');
    }

        /**
     * 削除処理
     */
    public function destroy($id)
    {
        // Booksテーブルから指定のIDのレコード1件を取得
        $movie = Movie::findorfail($id);
        // レコードを削除
        $movie->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('admin.movie.index')->with('message', '削除に成功しました');;
    }
}