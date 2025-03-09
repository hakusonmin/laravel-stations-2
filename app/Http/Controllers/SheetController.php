<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function index(Request $request, string $movie_id, string $schedule_id)
    {
        $sheets = Sheet::all();
        $date = $request->query('date');
        return view('user.sheet.index', compact('sheets', 'movie_id', 'schedule_id','date'));
    }
}
