<?php

namespace App\Http\Livewire\Photographers;

use App\Models\Creation;
use App\Models\Criteria;
use App\Models\Score;
use App\Models\User;
use Livewire\Component;

class Find extends Component
{
    public $criterias;
    public $criteria;
    public $categories;
    public $category;

    public $harga;
    public $durasi;
    public $teknologi;
    public $service;
    public $capacity;
    public $profesionalitas;

    public bool $table;

    public $photographers;
    public $score;

    // maut
    public $criteriaCollections;
    public $totalCriteriaValue;
    public $category_find;
    public $mauts;
    public $weighteds;


    public function mount()
    {

        $this->criterias = Criteria::all();
        $this->criteria = collect();

        $this->categories = Creation::globalCategory();
        $this->category = collect();

        $this->photographers = User::photographerScore();
        $this->score = collect();

        $this->harga = 0;
        $this->durasi = 0;
        $this->teknologi = 0;
        $this->service = 0;
        $this->capacity = 0;
        $this->profesionalitas = 0;
        $this->mauts = '';
        $this->weighteds = '';

        $this->table = false;
    }

    public function sortMaut()
    {
        $this->table = true;
        $this->criteriaCollections = collect([
            [
                'id' => 1,
                'value' =>  $this->harga,
            ],
            [
                'id' => 2,
                'value' =>  $this->durasi,
            ],
            [
                'id' => 3,
                'value' =>  $this->teknologi,
            ],
            [
                'id' => 4,
                'value' => $this->service,
            ],

            [
                'id' => 5,
                'value' =>  $this->capacity,
            ],
            [
                'id' => 6,
                'value' =>  $this->profesionalitas,
            ]
        ]);
        $inputCriteria = [
            $this->harga,
            $this->durasi,
            $this->teknologi,
            $this->service,
            $this->capacity,
            $this->profesionalitas
        ];
        $this->totalCriteriaValue = $this->criteriaCollections->sum('value');

        $weight = [];
        $maxCriteria = [];
        $minCriteria = [];
        foreach ($this->criteriaCollections as $criteriaCollection) {
            $weight[] = $criteriaCollection['value'] / $this->totalCriteriaValue;
            $maxCriteria[] = Score::query()
                ->with('criteria')
                ->where('criteria_id', $criteriaCollection['id'])
                ->max('score');

            $minCriteria[] = Score::query()
                ->with('criteria')
                ->where('criteria_id', $criteriaCollection['id'])
                ->min('score');
        }

        $photographers = User::query()
            ->with('scores')
            ->has('scores')
            ->whereHas('roles', function ($query) {
                return $query->where('name', 'photographer');
            })
            ->when($this->category_find != '', function ($q) {
                return $q->whereHas('creations', function ($query) {
                    return $query->where('category', 'like', "%$this->category_find%");
                });
            })
            ->get();

        if ($photographers->count() < 4) {
            $this->table = false;
        } else {
            $this->photographers = $photographers;

            foreach ($this->photographers as $photographer) {
                $sumPreference = 0;
                $sumPreferenceWeighted = 0;
                foreach ($photographer->scores->load('criteria') as $score) {
                    $checkScore[] = $score->score;

                    // maut
                    $normalizeScoreMaut = (($checkScore[$score->criteria_id - 1] - $minCriteria[($score->criteria_id - 1)]) / ($maxCriteria[($score->criteria_id - 1)] - $minCriteria[($score->criteria_id - 1)]));
                    $sumPreference += ($weight[($score->criteria_id - 1)] * $normalizeScoreMaut);

                    $countPreferenceScoreMaut[] = [
                        $photographer->id => $sumPreference,
                    ];

                    // weighted
                    $benefical = $score->score / $minCriteria[$score->criteria_id - 1];
                    if ($score->criteria->is_benefical == 1) {
                        $benefical =  $score->score / $maxCriteria[$score->criteria_id - 1];
                    }

                    $normalizeScoreWeighted = $benefical * $weight[$score->criteria_id - 1];
                    $sumPreferenceWeighted += $normalizeScoreWeighted;

                    $countPreferenceScoreWeighted[] = [
                        $photographer->id => $sumPreferenceWeighted,
                    ];
                }
                $preferenceScoreMaut[] = [
                    'preference' => array_sum($countPreferenceScoreMaut[$photographer->id]),
                    'id' => $photographer->id,
                    'name' => $photographer->name,
                    'username' => $photographer->username,
                ];

                // weighted
                $preferenceScoreWeighted[] = [
                    'preference' => array_sum($countPreferenceScoreWeighted[$photographer->id]),
                    'id' => $photographer->id,
                    'name' => $photographer->name,
                    'username' => $photographer->username,
                ];
            }
            arsort($preferenceScoreMaut);
            arsort($preferenceScoreWeighted);


            foreach ($preferenceScoreMaut as $score) {
                $sortByMaut[] = [
                    'name' => $score['name'],
                    'preference' => $score['preference'],
                    'username' => $score['username'],
                ];
            }

            foreach ($preferenceScoreWeighted as $score) {
                $sortByWeighted[] = [
                    'name' => $score['name'],
                    'preference' => $score['preference'],
                    'username' => $score['username'],
                ];
            }

            $this->mauts = $sortByMaut;
            $this->weighteds = $sortByWeighted;
        }
    }





    public function render()
    {
        return view('livewire.photographers.find');
    }
}
