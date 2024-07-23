<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavItem extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'parent_id', 'is_dropdown'];

    protected $casts = [
        'is_dropdown' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(NavItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(NavItem::class, 'parent_id');
    }
}