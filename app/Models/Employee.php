<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model 
{

    protected $table = 'employees';
    public $timestamps = true;

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }
}