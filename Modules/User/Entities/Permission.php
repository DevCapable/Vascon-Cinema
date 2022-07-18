<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'roles'
    ];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\PermissionFactory::new();
    }
}
