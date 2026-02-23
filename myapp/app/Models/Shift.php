<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'staff_id',
        'date',
        'time_type',
        'start_time',
        'end_time', 
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
