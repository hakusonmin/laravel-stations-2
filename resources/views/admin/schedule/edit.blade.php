
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>
<body>
    <h1>スケジュール編集</h1>
    
    <!-- 送信先を設定 -->
    <form action="{{ route('admin.schedule.update', ['scheduleId'=>$schedule->id]) }}" method="PATCH">
        <!-- CSRFトークンを設定（セキュリティ対策） -->
        @csrf
        
      <div>
          <label for="movie_id">作品ID</label>
          <input type="text" id="movie_id" name="movie_id" value="{{ $schedule->movie_id }}" required>
      </div>

      <div>
          <label for="start_time_date">開始日</label>
          <input type="date" id="start_time_date" name="start_time_date" required>
      </div>

      <div>
          <label for="start_time_time">開始時刻</label>
          <input type="time" id="start_time_time" name="start_time_time"  required>
      </div>

      <div>
          <label for="end_time_date">終了日</label>
          <input type="date" id="end_time_date" name="end_time_date"  required>
      </div>

      <div>
          <label for="end_time_time">終了時刻</label>
          <input type="time" id="end_time_time" name="end_time_time" required>
      </div>

    <button type="submit">更新</button>
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
</body>
</html>