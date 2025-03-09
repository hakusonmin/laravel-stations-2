<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>

<body>
    <h1>映画情報登録</h1>

    <!-- 送信先を設定 -->
    <form action="{{ route('admin.movie.update', ['id' => $movie->id]) }}" method="PATCH">
        <!-- CSRFトークンを設定（セキュリティ対策） -->
        @csrf

        <!-- 名前入力フィールド -->
        <div>
            <label for="title">映画タイトル</label>
            <input type="text" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
        </div>

        <!-- メールアドレス入力フィールド -->
        <div>
            <label for="image_url">画像URL</label>
            <input type="url" id="image_url" name="image_url" value="{{ old('image_url', $movie->image_url) }}"
                required>
        </div>

        <div>
            <label for="published_year">公開年</label>
            <input type="number" id="published_year" name="published_year"
                value="{{ old('published_year', $movie->published_year) }}" required>
        </div>

        <!-- メッセージ入力エリア -->
        <div>
            <label for="description">概要</label>
            <textarea id="description" name="description" required>{{ old('description', $movie->description) }}</textarea>
        </div>

        <div>
            <label for="is_showing">上映状態</label>
            <input type="text" id="is_showing" name="is_showing"
                value="{{ old('is_showing', $movie->is_showing ? '上映中' : '上映予定') }}" required>
        </div>

        <!-- ジャンル入力フィールド -->
        <div>
            <label for="genre">ジャンル</label>
            <input type="text" id="genre" name="genre" value="{{ old('genre->name', $movie->genre->name) }}"
                required>
        </div>


        <!-- 送信ボタン -->
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
</body>
