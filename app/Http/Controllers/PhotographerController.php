<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Creation;
use Illuminate\Http\Request;

class PhotographerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photographers = User::query()
            ->with('roles', 'media')
            ->whereHas('roles', function ($query) {
                return $query->where('name', 'photographer');
            })
            ->get();

        return view('photographers.index', compact('photographers'));
    }

    public function show(User $user)
    {
        $projects = Creation::query()
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('photographers.show', compact('user', 'projects'));
    }
}
