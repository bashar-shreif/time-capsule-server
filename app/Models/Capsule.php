<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Capsule extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'privacy_settings_id',
    'reveal_mode_id',
    'mood_id',
    'country_id',
    'message',
    'ip_address',
    'color',
    'revealed_at',
    'background',
];
}
