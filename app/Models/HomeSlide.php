<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 
        'description',
        'video_url', 
        'home_image',
        'back_color',
    ];
}
