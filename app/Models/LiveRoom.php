<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class LiveRoom extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'user_id', 'live_category_id', 'excerpt'];
}
