<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Capsule;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['tag',];
    public function capsules() {
        return $this->belongsToMany(Capsule::class);
    }

}
