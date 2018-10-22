<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model 
{

    protected $table = 'divisions';
    public $timestamps = true;

    public function employee(){
        return $this->hasOne(Employee::class);
    }

}