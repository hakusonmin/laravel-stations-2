<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>
<body>
      <div>{{ $movie->title }}</div>
      <div>{{ $movie->image_url }}</div>
      <div>{{ $movie->published_year }}</div>
      <div>{{ $movie->description }}</div>
      <div>{{ $movie->is_showing ? '上映中' : '上映予定' }}</div>
      <div>{{ $movie->genre->name}}</div>
      @foreach ($movie->schedules->sortBy('start_time') as $schedule)
        <div>{{ $schedule->start_time}}</div>
        <div>{{ $schedule->end_time}}</div>
      @endforeach
      <button class="back-button" type="button" onclick="location.href='{{ route('user.sheet.index',['movie_id' => $movie->id,'schedule_id' => $schedule->id, 'date' => $schedule->start_time->format('Y-m-d')]) }}'">予約する</button>

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
