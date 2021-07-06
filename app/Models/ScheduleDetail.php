<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    // relations
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
