<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'photo',
        'status',
        'verified',
        'enrollment_no',
        'dept_id',
        'role_id',
        'password',
    ];

    public function department(){
        return $this->belongsTo(department::class , 'dept_id');
    }

    public function role(){
        return $this->belongsTo(Role::class , 'role_id');
    }
}
