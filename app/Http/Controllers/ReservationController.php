<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, string $movie_id, string $schedule_id)
    {
        if (!$request->has('date') || !$request->has('sheetId')) {
            abort(400, 'Missing required parameters');
        }

        $sheetId = $request->query('sheetId');
        $exists = Reservation::where('schedule_id', $schedule_id)
            ->where('sheet_id', $sheetId)
            ->exists();

        if ($exists) {
            abort(400, 'This seat is already reserved');
        }

        $sheet_id = $request->query('sheetId');
        $date = $request->query('date');
        return view(('user.reservation.create'), compact('movie_id', 'schedule_id', 'sheet_id', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required|integer|exists:schedules,id',
            'sheet_id' => 'required|integer|exists:sheets,id',
            'unique:reservations,sheet_id',
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'date' => 'required|date',
        ]);

        // **バリデーションエラー時に予約を保存しないようにする**
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        return DB::transaction(function () use ($request) {
            // **すでに予約が存在する場合は登録しない**
            $existingReservation = Reservation::where('schedule_id', $request->schedule_id)
                ->where('sheet_id', $request->sheet_id)
                ->where('date', $request->date)
                ->exists();

            if ($existingReservation) {
                return redirect()->route('user.sheet.index', [
                    'movie_id' => $request->movie_id,
                    'schedule_id' => $request->schedule_id
                ])->with('error', 'その座席はすでに予約済みです');
            }

            // **バリデーションエラーがなければ予約を保存**
            $reservation = new Reservation();
            $reservation->date = $request->date;
            $reservation->schedule_id = $request->schedule_id;
            $reservation->sheet_id = $request->sheet_id;
            $reservation->email = $request->email;
            $reservation->name = $request->name;
            $reservation->is_canceled = true;
            $reservation->save();

            return redirect()->route('user.movie.show', ['id' => $request->movie_id])
                ->with('success', '予約が完了しました');
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
