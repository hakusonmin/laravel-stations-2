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

        $sheets = Sheet::all();
        $date = $request->query('date');
        return view('user.sheet.index', compact('sheets', 'movie_id', 'schedule_id','date'));
    }
}




