<?php

namespace Database\Seeders;

use App\Models\Practice;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Schedule;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        Schedule::factory(10)->create();
        Reservation::factory(10)->create();

        $path = 'database/sql/sheet.sql';
        DB::unprepared(file_get_contents($path));
    }
}
