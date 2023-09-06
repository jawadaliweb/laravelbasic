<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutEducation extends Model
{
    public $table = 'AboutEducation';
    use HasFactory;
    protected $fillable = [
        'title',
        'description',      
        'from_date',
        'to_date',
    ];
}
