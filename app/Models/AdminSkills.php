<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSkills extends Model
{
    public $table = 'skills';
    
    use HasFactory;

    protected $fillable = [
        'title',
        'percentage',
    ];
}
