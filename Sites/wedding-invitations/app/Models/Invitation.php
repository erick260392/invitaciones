<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public function guests()
{
    return $this->hasMany(Guest::class);
}
}
