<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publication;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];

    public function Publications()
    {
        return $this->hasMany(Publication::class);
    }
}
