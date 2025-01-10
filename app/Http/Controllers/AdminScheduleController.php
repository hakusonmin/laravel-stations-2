<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminScheduleController extends Controller
{
  public function index()
  {
    $movies = Movie::all();
    return view('admin.schedule.index', compact('movies'));
  }    

  public function create($id)
  { 
    $movie = Movie::find($id);
    return view('admin.schedule.create',compact('movie'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'movie_id' => 'required|exists:movies,id',
      'start_time_date' => 'required|date_format:Y-m-d',
      'start_time_time' => 'required|date_format:H:i',
      'end_time_date' => 'required|date_format:Y-m-d',
      'end_time_time' => 'required|date_format:H:i',
    ]);

// 開始日時と終了日時を結合してCarbonインスタンスに変換する処理
$startDateTime = Carbon::parse("{$validated['start_time_date']} {$validated['start_time_time']}");
$endDateTime = Carbon::parse("{$validated['end_time_date']} {$validated['end_time_time']}");

if ($startDateTime->greaterThan($endDateTime)) {
  return redirect()->back()
                  ->withErrors([
                      'start_time_date' => '開始日時は終了日時より後に設定できません。',
                      'end_time_date' => '終了日時は開始日時より前に設定できません。',
                      'start_time_time' => '',
                      'end_time_time' => ''
                    ])
                    ->withInput();
}

if ($startDateTime->equalTo($endDateTime)) {
  return redirect()->back()
                  ->withErrors([
                      'start_time_time' => '開始時刻と終了時刻は異なる必要があります。',
                      'end_time_time' => '開始時刻と終了時刻は異なる必要があります。',
                      'start_time_time' => '',
                      'end_time_time' => ''
                    ])
                  ->withInput();
}

if ($startDateTime->diffInMinutes($endDateTime) <= 5) {
  return redirect()->back()
                  ->withErrors([
                      'start_time_time' => '開始時刻と終了時刻の差は5分以上でなければなりません。',
                      'end_time_time' => '開始時刻と終了時刻の差は5分以上でなければなりません。',
                      'start_time_time' => '',
                      'end_time_time' => ''
                  ])
                  ->withInput();
}

//インスタンスのまま保存してOK
Schedule::create([
    'movie_id' => $validated['movie_id'],
    'start_time' => $startDateTime,
    'end_time' => $endDateTime,
]);

    return redirect()->route('admin.movie.show',['id' => $validated['movie_id']])
        ->with('success', 'スケジュールが作成されました');
  }

  public function edit($scheduleid)
  {
      $schedule = Schedule::find($scheduleid);

      return view('admin.schedule.edit', compact('schedule'));
  }

  public function update(Request $request, $scheduleId)
  {
    $validated = $request->validate([
      'movie_id' => 'required|exists:movies,id',
      'start_time_date' => 'required|date_format:Y-m-d',
      'start_time_time' => 'required|date_format:H:i',
      'end_time_date' => 'required|date_format:Y-m-d',
      'end_time_time' => 'required|date_format:H:i',
    ]);

    // start_time と end_time を結合
    $start_time = $validated['start_time_date'] . ' ' . $validated['start_time_time'];
    $end_time = $validated['end_time_date'] . ' ' . $validated['end_time_time'];
    
    $schedule = Schedule::find($scheduleId);
    $schedule->start_time = $start_time;
    $schedule->end_time = $end_time;
    $schedule->save();

    return redirect()->route('admin.movie.show',['id' => $validated['movie_id']])
        ->with('success', 'スケジュールが更新されました');
  }

  public function destroy($scheduleId)
  {
      $schedule = Schedule::findorfail($scheduleId);
      $schedule->delete();
      return redirect()->route('admin.schedule.index')->with('message', '削除に成功しました');;
  }
}