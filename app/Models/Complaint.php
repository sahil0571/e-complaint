<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    public function department(){
        return $this->belongsTo(department::class , 'dept_id');
    }

    public function type(){
        return $this->belongsTo(ComplaintType::class , 'ct_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'u_id');
    }

}
