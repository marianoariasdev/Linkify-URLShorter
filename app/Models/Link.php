<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'original_url',
        'short_url',
        'visit_counter',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
