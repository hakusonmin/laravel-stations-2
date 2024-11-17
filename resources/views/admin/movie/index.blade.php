<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>
<body>
    <table border="1">
      <thead>
      <tr>
        <th>映画タイトル</th>
        <th>画像URL</th>
        <th>公開日</th>
        <th>概要</th>
        <th>上映中かどうか</th>
      </tr>
      </thead>
      <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <th>{{ $movie->title }}</th>
                    <td>{{ $movie->image_url }} </td>
                    <td>{{ $movie->published_year }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
                    <td><a href="{{ route('admin.movie.edit', ['id'=> $movie->id]) }}" >編集</a></td>
                    <td>
                      <form action="{{ route('admin.movie.destroy', ['id'=>$movie->id]) }}" method="Delete">
                        @csrf
                        <button type="submit">削除</button>
                      </form>
                    </td>
                </tr>
            @endforeach
      </tbody>
    </table>
</body>
</html>