<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $casts = [
        'is_showing' => 'boolean',
    ];

    public function genre()
    {
      return $this->belongsTo(Genre::class);
    }

    public function schedules(){
      return $this->hasMany(Schedule::class);
    }
}
