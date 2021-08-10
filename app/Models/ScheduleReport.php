<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'date'];

    public function photographer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
