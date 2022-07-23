<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_short',
        'user_id', 
        'level_id',
        'day_id',
        'time_id', 
        'classroom_id',
        'floor',
        'seats'
    ]; 

    public function users(){ 
        return $this->hasOne(User::class, 'id');
    }
}