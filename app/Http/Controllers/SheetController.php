<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function ClassicIndex()
    {
        $sheets = Sheet::all();
        return view('user.sheet.classicIndex', compact('sheets'));
    }

    public function index(Request $request, string $movie_id, string $schedule_id)
    {
        if (!$request->filled('date')) {
            abort(400, 'Missing required parameter: date');
        }


        $date = $request->query('date');

        $date = now()->format('Y-m-d');

        // 指定された映画のスケジュールに基づいた予約情報を取得
        $sheets = Sheet::with(['reservations' => function ($query) use ($date, $schedule_id) {
            $query->where('date', '=', $date)
                  ->where('schedule_id', '=', $schedule_id)
                  ->where('is_canceled', false);
        }])->get();

        // 各シートに `is_reserved` をセット
        foreach ($sheets as $sheet) {
            $sheet->is_reserved = $sheet->reservations->isNotEmpty();
        }

        return view('user.sheet.index', compact('sheets', 'movie_id', 'schedule_id','date'));
    }
}




