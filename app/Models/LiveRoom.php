<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class LiveRoom extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'live_category_id', 'excerpt'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function live_category()
    {
        return $this->belongsTo(LiveCategory::class);
    }
}
