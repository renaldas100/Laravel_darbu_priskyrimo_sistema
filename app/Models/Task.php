<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

//    public $date=['date'];


    protected $casts = [
        'date' => 'datetime',
    ];


    public function users(){
        return $this->belongsToMany(User::class)->withPivot('date')->withTimestamps();
    }


}
