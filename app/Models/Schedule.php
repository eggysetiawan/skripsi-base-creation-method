<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['date', 'start', 'end'];

    public static function getSchedules()
    {
        return static::query()
            ->with(['customer', 'photographer', 'detail'])
            ->when(User::with('roles')->find(auth()->id())->roles->first()->name == 'photographer', function ($query) {
                return $query->where('photographer_id', auth()->id());
            })
            ->when(User::with('roles')->find(auth()->id())->roles->first()->name == 'customer', function ($query) {
                return $query->where('customer_id', auth()->id());
            })
            ->latest()
            ->get();
    }

    // relations
    public function photographer()
    {
        return $this->belongsTo(User::class, 'photographer_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function detail()
    {
        return $this->hasOne(ScheduleDetail::class);
    }
}
