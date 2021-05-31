<?php

namespace Modules\Cinema\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lekki extends Model
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
    
    protected static function newFactory()
    {
        return \Modules\Cinema\Database\factories\LekkiFactory::new();
    }
}
