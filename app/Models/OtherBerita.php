<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherBerita extends Model
{
    use HasFactory;

    protected $table = 'other_berita';

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'author',
        'date',
        'image',
    ];
}