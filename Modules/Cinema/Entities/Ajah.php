<?php

namespace Modules\Cinema\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ajah extends Model
{
    use HasFactory;


    protected $fillable = [
        'admin',
        'caption',
        'movie',
        'details',
        'date',
        'time',
        'status'
    ];
    
}
