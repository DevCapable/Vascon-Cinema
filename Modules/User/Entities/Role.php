<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class role extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'permissions',
    ];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\RoleFactory::new();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
