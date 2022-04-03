<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintType extends Model
{
    use HasFactory;

    public function complaint()
    {
        return $this->hasMany(Complaint::class, 'ct_id', 'id');
    }
}
