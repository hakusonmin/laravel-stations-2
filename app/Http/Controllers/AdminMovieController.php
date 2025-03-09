<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
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
  public function store(MovieRequest $request)
  {

    DB::transaction(function () use ($request) {
      $genreId = $request->genre
            ? Genre::firstOrCreate(['name' => trim($request->genre)])->id
            : null;

      // モデルを使用してデータをデータベースに保存
      $movies = new Movie();
      $movies->title = $request->title;
      $movies->image_url = $request->image_url;
      $movies->published_year = $request->published_year;
      $movies->description = $request->description;
      $movies->is_showing = $request->is_showing;
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


    // DB::transaction(function () use ($validated, $id) {

    //     $genreId = $validated['genre']
    //         ? Genre::firstOrCreate(['name' => trim($validated['genre'])])->id
    //         : null;

    //     $movies = Movie::find($id);
    //     $movies->title = $validated['title'];
    //     $movies->image_url = $validated['image_url'];
    //     $movies->published_year = $validated['published_year'];
    //     $movies->description = $validated['description'];
    //     $movies->is_showing = $validated['is_showing'] == 'true' ? 1 : 0;
    //     $movies->genre_id = $genreId;
    //     $movies->save();
    // });

    //     return redirect()->route('admin.movie.index');
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
