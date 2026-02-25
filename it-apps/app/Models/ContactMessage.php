<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $table = 'contact_messages';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'phone',
        'is_read',
        'is_replied',
        'replied_at',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_replied' => 'boolean',
        'replied_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}