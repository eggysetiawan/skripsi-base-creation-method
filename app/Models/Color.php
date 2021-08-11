<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['photographer_id', 'name'];

    public $timestamps = false;

    public function photographer()
    {
        return $this->belongsTo(User::class);
    }
}
