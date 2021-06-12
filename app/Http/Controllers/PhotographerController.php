<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            ->with('roles')
            ->whereHas('roles', function ($query) {
                return $query->where('name', 'photographer');
            })
            ->get();

        return view('photographers.index', compact('photographers'));
    }

    public function show(User $user)
    {
        dd($user);
        return view('photographers.show', compact('user'));
    }
}
