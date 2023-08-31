<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
use App\Models\Profile;

class Publication extends Model
{
    use HasFactory;

    public function Profile()
    {
        return $this->belongsTo(Profile::class);
    }

    // public function Images()
    // {
    //     return $this->hasMany(Images::class);
    // }
}
