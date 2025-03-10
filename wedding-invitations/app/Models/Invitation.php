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

    protected $dates = [
        'event_date',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invitation) {
            $invitation->unique_code = self::generateUniqueCode();
        });
    }

    private static function generateUniqueCode()
    {
        do {
            // Generar código de 8 caracteres (letras y números)
            $code = strtoupper(substr(md5(uniqid()), 0, 8));
        } while (self::where('unique_code', $code)->exists());

        return $code;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
    public function getRouteKeyName()
    {
        return 'unique_code'; // Usar unique_code en lugar de id para las rutas
    }

     // Añade esta relación
     public function invitations()
     {
         return $this->hasMany(Invitation::class);
     }
}
