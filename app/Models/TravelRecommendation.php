<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelRecommendation extends Model
{
    use HasFactory;

    protected $table = 'travel_recommendations';

    protected $fillable = ['image', 'judul', 'sub_judul', 'isi', 'map_location', 'author', 'date'];
}