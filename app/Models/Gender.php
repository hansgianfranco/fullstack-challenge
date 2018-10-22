<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model 
{

    protected $table = 'genders';
    public $timestamps = true;

    public function employee(){
        return $this->hasOne(Employee::class);
    }
}