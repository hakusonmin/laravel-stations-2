<div class="container">
  <h1>予約フォーム</h1>

  <form action="{{ route('user.reservation.store') }}" method="POST">
    @csrf
    <!-- 映画作品 -->
    <div class="mb-3">
      <label class="form-label">映画作品ID:</label>
      <p>{{ $movie_id }}</p>
      <input type="hidden" name="movie_id" value="{{ $movie_id }}">
    </div>

    <!-- 上映スケジュール -->
    <div class="mb-3">
      <label class="form-label">スケジュールID:</label>
      <p>{{ $schedule_id }}</p>
      <input type="hidden" name="schedule_id" value="{{ $schedule_id }}">
    </div>

    <!-- 座席 -->
    <div class="mb-3">
      <label class="form-label">座席ID:</label>
      <p>{{ $sheet_id }}</p>
      <input type="hidden" name="sheet_id" value="{{ $sheet_id }}">
    </div>

    <!-- 日付 -->
    <div class="mb-3">
      <label class="form-label">日付:</label>
      <p>{{ $date }}</p>
      <input type="hidden" name="date" value="{{ $date }}">
    </div>

    <!-- 予約者氏名 -->
    <div class="mb-3">
      <label for="name" class="form-label">予約者氏名:</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <!-- 予約者メールアドレス -->
    <div class="mb-3">
      <label for="email" class="form-label">予約者メールアドレス:</label>
      <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">予約する</button>
  </form>
</div>
