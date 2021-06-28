<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = [];

    public function score()
    {
        return $this->hasOne(Score::class);
    }
}
