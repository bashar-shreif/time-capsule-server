<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Mood;

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
    public function mood()
    {
        return $this->belongsTo(Mood::class, 'mood_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'capsules_tags', 'tag_id', 'capsule_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
