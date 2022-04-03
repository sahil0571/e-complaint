<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function complaint(){
       return $this->hasMany(Complaint::class,'dept_id' , 'id');
    }

}
