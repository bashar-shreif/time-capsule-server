<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Capsule;

class Mood extends Model
{
    use HasFactory;
    protected $fillable = ['mood',];
    protected function capsules()
    {
        return $this->hasMany(Capsule::class);
    }

}
