<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
  public function index(Request $request)
  {
      // クエリパラメータの取得
      $isShowing = $request->query('is_showing', null); // 公開状態 (null = すべて)
      $keyword = $request->query('keyword', '');       // キーワード検索 (デフォルト: 空文字)
      
      // クエリビルダーの初期化
      $query = Movie::query();

      // 公開状態で絞り込み
      if (!is_null($isShowing)) {
          $query->where('is_showing', $isShowing);
      }
      
      //ここで同じqueryを取り回すことでさらなる絞り込みを行うことができる
      // キーワード検索で絞り込み
      if (!empty($keyword)) {
          $query->where(function ($q) use ($keyword) {
              $q->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%');
          });
      }

      // ページネーション (20件ごと)
      $movies = $query->paginate(20);

      // ビューにデータを渡す
      return view('user.movie.index', [
          'movies' => $movies,
          'isShowing' => $isShowing,
          'keyword' => $keyword,
      ]);
  }

  public function show($id)
  {
        $movie = Movie::find($id);

        return view('user.movie.show', compact('movie'));
  }
}

