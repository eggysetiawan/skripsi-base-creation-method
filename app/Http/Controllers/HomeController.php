<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $creations = Creation::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        $projects = Creation::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('home', compact('projects', 'creations'));
    }
}
