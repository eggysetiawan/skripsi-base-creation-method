<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionnaireRequest;
use App\Http\Requests\UpdateQuestionnaireRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\User;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::getQuestionnaires();
        $questionnaireExist = Questionnaire::isExists();
        return view('questionnaires.index', compact('questionnaires', 'questionnaireExist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        $questionnaire = new Questionnaire();
        return view('questionnaires.create', compact('questionnaire', 'questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionnaireRequest $request)
    {
        $request->validated();

        $questions = Question::find($request->questions);
        foreach ($questions as $question) {
            auth()->user()->questionnaires()->create([
                'question_id' => $question->id,
                'answer' => $request->answers[$question->id],
            ]);
        }

        session()->flash('success', 'Kuisioner telah berhasil di submit!');
        return redirect('questionnaires');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        return view('questionnaires.edit', compact('questionnaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->update($request->validated());
        session()->flash('success', 'Kuisioner telah berhasil di update!');
        return redirect('questionnaires');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
