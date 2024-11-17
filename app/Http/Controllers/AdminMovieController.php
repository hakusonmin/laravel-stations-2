<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AdminMovieController extends Controller
{
  public function index()
  {
    $movies = Movie::all();
    return view('admin.movie.index', ['movies' => $movies]);
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
      ]);

      // モデルを使用してデータをデータベースに保存
      $movies = new Movie();
      $movies->title = $validated['title'];
      $movies->image_url = $validated['image_url'];
      $movies->published_year = $validated['published_year'];
      $movies->description = $validated['description'];
      $movies->is_showing = $validated['is_showing'];
      $movies->save();

      return redirect()->route('admin.movie.index');
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
    ]);
        $movies = Movie::find($id);
        $movies->title = $validated['title'];
        $movies->image_url = $validated['image_url'];
        $movies->published_year = $validated['published_year'];
        $movies->description = $validated['description'];
        $movies->is_showing = $validated['is_showing'] == 'true' ? 1 : 0;
        $movies->save();
        
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
        return redirect()->route('admin.movie.index');
    }
}