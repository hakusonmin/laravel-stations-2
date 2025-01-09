<?php

namespace Database\Seeders;

use App\Models\Practice;
use App\Models\Movie;
use App\Models\Genre;
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
    {   Genre::factory(10)->create();
        Practice::factory(10)->create();
        Movie::factory(10)->create();
        
        $path = 'database/sql/sheet.sql';
        DB::unprepared(file_get_contents($path));
    }
}
