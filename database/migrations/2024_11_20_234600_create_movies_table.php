<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('image_url');
            $table->integer('published_year');
            $table->tinyInteger('is_showing');
            $table->text('description');
            $table->foreignId('genre_id');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE movies ADD UNIQUE INDEX title_unique (title(255))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
