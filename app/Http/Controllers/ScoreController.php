<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ScoreRequest;
use App\Http\Requests\UpdateScoreRequest;

class ScoreController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRating(ScoreRequest $request, User $user)
    {
        $request->validated();

        $criterias = Criteria::find($request->criterias);
        $score = 0;

        DB::transaction(function () use ($criterias, $user, $score, $request) {

            foreach ($criterias as $criteria) {
                Score::create([
                    'user_id' => $user->id,
                    'criteria_id' => $criteria->id,
                    'score' => $request->score[$criteria->id],
                ]);
                $score += $request->score[$criteria->id];
            }

            $user->update([
                'score' => $score,
            ]);
        });

        session()->flash('success', 'Penilaian telah berhasil dibuat!');
        return redirect('questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $scores = Score::with('criteria')->whereHas('criteria')->get();

        $questionnaires = Questionnaire::query()
            ->with('question', 'author')
            ->where('user_id', $user->id)
            ->get();

        return view('scores.edit', compact('user', 'scores', 'questionnaires'));
    }

    public function rating(User $user)
    {
        $criterias = Criteria::all();

        $questionnaires = Questionnaire::query()
            ->with('question', 'author')
            ->where('user_id', $user->id)
            ->get();
        return view('scores.rating', compact('user', 'criterias', 'questionnaires'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScoreRequest $request, User $user)
    {
        $request->validated();

        $scores = 0;
        foreach ($user->scores as $score) {
            $score->update([
                'score' => $request->score[$score->id],

            ]);
            $scores += $request->score[$score->id];
        }
        $user->update([
            'score' => $scores,
        ]);
        session()->flash('success', 'Penilaian telah berhasil diperbarui!');
        return redirect('questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
