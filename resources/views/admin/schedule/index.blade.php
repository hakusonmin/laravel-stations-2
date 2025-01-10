<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
    <style>
    .movies-container {
        display: flex;
        flex-wrap: wrap; 
        gap: 20px;
    }
    .movie {
        border: 1px solid #ccc; 
        padding: 10px; 
        width: 200px; 
    }
    .movie h2 {
        font-size: 18px;
        margin-bottom: 10px;
        text-align: center; 
    }
    .movie ul {
        list-style-type: disc;
        margin-left: 20px;
    }
    </style>
</head>
<body>
  <div class="movies-container">
    @foreach ($movies as $movie)
      <div class="movie">
        <h2>{{ $movie->title }}</h2>
          <ul>
            @foreach ($movie->schedules->sortBy('start_time') as $schedule)
              <li>{{ $schedule->start_time->format('H:i:m')}}</li>
              <li>{{ $schedule->end_time->format('H:i:m')}}</li>
            @endforeach
          </ul>
      </div>
    @endforeach
  </div>
</body>
</html>

