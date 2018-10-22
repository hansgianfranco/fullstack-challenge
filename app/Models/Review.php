<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model 
{

    protected $table = 'reviews';
    protected $dates = ['created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['review_date', 'employee_id', 'productivity', 'knowledge', 'relationship', 'performance',
        'initiative'];

    public $timestamps = true;

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

}