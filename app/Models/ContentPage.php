<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentPage extends Model
{
    use HasFactory;

    // Field yang dapat diisi
    protected $fillable = ['title', 'content'];
}