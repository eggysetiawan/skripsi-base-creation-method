<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class FindPhotographerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('photographers.find');
    }
}
