<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable;
    use InteractsWithMedia;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'bio',
        'mobile',
        'brand',
        'score'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function allPhotographers($query)
    {
        return static::query()
            ->with('roles', 'media')
            ->whereHas('roles', function ($query) {
                return $query->where('name', 'photographer');
            })
            ->where('name', 'like', "%$query%")
            ->get();
    }

    public static function photographers()
    {
        return static::query()
            ->with('roles', 'media')
            ->whereHas('roles', function ($query) {
                return $query->where('name', 'photographer');
            })
            ->get();
    }

    public static function photographerScore()
    {
        return static::query()
            ->with('scores')
            ->has('scores')
            ->whereHas('roles', function ($query) {
                return $query->where('name', 'photographer');
            })
            ->get();
    }

    // relations
    public function creations()
    {
        return $this->hasMany(Creation::class);
    }

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
