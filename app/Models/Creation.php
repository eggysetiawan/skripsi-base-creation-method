<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Creation extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'category', 'description'];

    protected $with = ['author', 'media'];

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(300)
    //         ->height(200)
    //         ->performOnCollections('creation');
    // }

    // queries
    public static function categoryList($user)
    {
        return static::query()
            ->select('category', DB::raw('count(*) as total'))
            ->when(auth()->id() != 1, function ($query) use ($user) {
                return $query->where('user_id', $user);
            })
            ->groupBy('category')
            ->get();
    }

    public static function allCreations($user)
    {
        return static::query()
            ->when(auth()->id() != 1, function ($query) use ($user) {
                return $query->where('user_id', $user);
            })->get();
    }
    public static function creations($categories, $user)
    {
        $user = $user ?? auth()->id();
        return static::query()
            ->when(auth()->id() != 1, function ($query) use ($user) {
                return $query->where('user_id', $user);
            })
            ->whereIn('category', $categories)
            ->get();
    }



    // relations
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
