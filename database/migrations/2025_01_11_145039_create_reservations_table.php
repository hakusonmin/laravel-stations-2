<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('schedule_id')->constrained('schedules')->index()->name('custom_schedule_foreign_key');
            $table->foreignId('sheet_id')->constrained('sheets')->index()->name('custom_sheet_foreign_key');
            $table->string('email',255);
            $table->string('name',255);
            $table->boolean('is_canceled')->default(false);
            $table->unique(['schedule_id','sheet_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
