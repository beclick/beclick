<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function requesteds()
    {
        return $this->hasMany(Requested::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
