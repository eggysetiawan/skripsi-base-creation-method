<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function photographer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
