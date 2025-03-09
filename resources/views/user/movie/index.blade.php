<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>
<body>

    <h1>映画作品リスト</h1>
    <form action="{{ route('user.movie.index') }}" method="GET">
        <div>
            <input type="text" name="keyword" value="{{ request()->query('keyword') }}" placeholder="キーワードを入力">
        </div>
        <div>
            <label>
                <input type="radio" name="is_showing" value="" {{ $isShowing === null ? 'checked' : '' }}>
                すべて
            </label>
            <label>
                <input type="radio" name="is_showing" value="0" {{ $isShowing === '0' ? 'checked' : '' }}>
                公開予定
            </label>
            <label>
                <input type="radio" name="is_showing" value="1" {{ $isShowing === '1' ? 'checked' : '' }}>
                公開中
            </label>
        </div>
        <button type="submit">検索</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>概要</th>
                <th>公開状態</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->image_url }}</td>
                    <td>{{ $movie->is_showing ? '公開中' : '公開予定' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">該当する映画が見つかりません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- ページネーション -->
    {{ $movies->links() }}


    @if ($errors->any())

      <div class="error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('message'))
      <div class="message">
        {{ session('message') }}
      </div>
    @endif
</body>
</html>

