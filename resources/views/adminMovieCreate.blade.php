
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
    <form method="POST" action="{{ url('/admin/movies/store') }}">
        <!-- CSRFトークンを設定（セキュリティ対策） -->
        @csrf
        
        <!-- 名前入力フィールド -->
        <div>
            <label for="title">映画タイトル：</label>
            <input type="text" id="title" name="title" required>
        </div>
        
        <!-- メールアドレス入力フィールド -->
        <div>
            <label for="image_url">画像URL</label>
            <input type="url" id="image_url" name="image_url" required>
        </div>

        <div>
            <label for="published_year">公開年</label>
            <input type="number" id="published_year" name="published_year" required>
        </div>
        
        <!-- メッセージ入力エリア -->
        <div>
            <label for="description">概要</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div>
            <label for="is_showing">上映中</label>
            <input type="checkbox" id="is_showing" name="is_showing" required>
        </div>
        <div>
            <label for="is_showing_false">上映予定</label>
            <input type="checkbox" id="is_showing" name="is_showing" required>
        </div>
        
        <!-- 送信ボタン -->
        <div>
            <button type="submit">送信</button>
        </div>
    </form>
</body>