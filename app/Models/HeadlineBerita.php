<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadlineBerita extends Model
{
    use HasFactory;

    protected $table = 'headline_berita';

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'author',
        'date',
        'image',
    ];
}