@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
    <link rel="stylesheet" href="{{ asset('css/utils.css') }}">
</head>
<body>
  @extends('layouts.template');
  @section('content')
    <section class="my-wrapper">
      <div class="wrapper">
        <h2>映画情報登録</h2>
        <!-- 送信先を設定 -->
        <form action="{{ route('admin.movie.store') }}" method="POST">
            @csrf
            <!-- 名前入力フィールド -->
            <dl>
              <dt><label for="title">映画タイトル</label></dt>
              <dd><input type="text" id="title" name="title" required></dd>

              <!-- メールアドレス入力フィールド -->
              <dt><label for="image_url">画像URL</label></dt>
              <dd><input type="url" id="image_url" name="image_url" required></dd>  
              
              <dt><label for="published_year">公開年</label></dt>
              <dd><input type="number" id="published_year" name="published_year" required></dd>
              
              <!-- メッセージ入力エリア -->
              <dt><label for="description">概要</label></dt>
              <dd><textarea id="description" name="description" required></textarea></dd>

              <dt><label for="genre">ジャンル</label></dt>
              <dd><input type="text" id="genre" name="genre" required></dd>
            
              <dt><label for="is_showing">上映中</label></dt>
              <dd><input type="checkbox" id="is_showing" name="is_showing" value="1"></dd>

              <dt><label for="is_showing_false">上映予定</label></dt>
              <dd><input type="checkbox" id="is_showing" name="is_showing" value="0"></dd>
              
              <!-- 送信ボタン -->
              <button type="submit">送信</button>
            </dl>
        </form>

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
      </div>
    </section>
  @endsection
</body>
