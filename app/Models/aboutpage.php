<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutpage extends Model
{
    public $table = 'aboutpage';
    
    use HasFactory;

    protected $fillable = [
        'title',
        'Short_title',
        'description',
        'resume_link',
        'about_image',
    ];
}
