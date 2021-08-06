<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreationRequest;
use Illuminate\Support\Facades\DB;

class CreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $creation = new Creation();
        $categories = Creation::select('category')->groupByRaw('category')->get();
        return view('creations.create', compact('creation', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreationRequest $request)
    {
        $attr = $request->validated();
        $slug = Str::slug($request->title . '-' . $request->category);
        $attr['slug'] = Str::limit($slug, 255);
        $attr['category'] = strtolower($request->category);

        DB::transaction(function () use ($attr) {
            $creations = auth()->user()->creations()->create($attr);
            $creations
                ->addMultipleMediaFromRequest(['photos'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('creation');
                });
        });

        session()->flash('success', 'Album Berhasil dibuat');
        return redirect()->route('photographer.show', auth()->user()->username);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function show(Creation $creation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function edit(Creation $creation)
    {
        return view('creations.edit', compact('creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function update(CreationRequest $request, Creation $creation)
    {
        $attr = $request->validated();
        $creation->update($attr);
        session()->flash('success', 'Album telah berhasil diupdate!');
        return redirect()->route('photographer.show', auth()->user()->username);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creation $creation)
    {
        $creation->delete();
        $creation->media()->delete();
        session()->flash('success', 'Album telah berhasil dihapus!');
        return back();
    }
}
