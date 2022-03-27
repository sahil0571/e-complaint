<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    public function department(){
        return $this->belongsTo(department::class , 'dept_id');
    }

    public function role(){
        return $this->belongsTo(Role::class , 'role_id');
    }
}
