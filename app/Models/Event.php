<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_date', 'title', 'description', 'subtitle', 'location', 'image', 'link'
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    // Optionally, you can add a mutator to ensure date formatting
    public function getEventDateAttribute($value)
    {
        return Carbon::parse($value);
    }
}