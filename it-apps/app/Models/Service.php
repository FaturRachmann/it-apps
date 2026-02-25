<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'full_description',
        'estimated_price',
        'price_note',
        'scope',
        'icon_url',
        'image_url',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'scope' => 'array',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}