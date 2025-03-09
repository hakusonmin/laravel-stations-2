<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

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
        $sheet_id = $request->query('sheet_id');
        $date = $request->query('date');
        return view(('user.reservation.create'), compact('movie_id', 'schedule_id', 'sheet_id', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        $existingReservation = Reservation::where('schedule_id', $request->schedule_id)
            ->where('sheet_id', $request->sheet_id)
            ->where('date', $request->date)
            ->exists();

        if ($existingReservation) {
            return redirect()->route('user.movie.show', ['id' => $request->movie_id, 'date' => $request->date])
                ->with('error', 'その座席はすでに予約済みです');
        }

        $model = new Reservation();
        $model->date = $request->date;
        $model->schedule_id = $request->schedule_id;
        $model->sheet_id = $request->sheet_id;
        $model->email = $request->email;
        $model->name = $request->name;
        $model->save();

        return redirect()
            ->route('user.movie.index')
            ->with([
                'message' => '予約が完了しました',
                'status' => 'info'
            ]);
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
