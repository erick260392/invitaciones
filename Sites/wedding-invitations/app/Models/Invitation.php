<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'groom_name',
        'bride_name',
        'event_date',
        'location',
        'description',
        'cover_image',
        'unique_code',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
