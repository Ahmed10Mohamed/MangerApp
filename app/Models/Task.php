<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function user_info()
    {
        return $this->belongsTo(Client::class,'user');
    }
    public function group_info()
    {
        return $this->belongsTo(Group::class,'group');
    }
}
