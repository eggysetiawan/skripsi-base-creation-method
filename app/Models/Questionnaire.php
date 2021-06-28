<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getQuestionnaires()
    {
        return static::query()
            ->with('question', 'author')
            ->where('user_id', auth()->id())
            ->get();
    }

    public static function isExists()
    {
        return static::query()
            ->with('question', 'author')
            ->where('user_id', auth()->id())
            ->exists();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
