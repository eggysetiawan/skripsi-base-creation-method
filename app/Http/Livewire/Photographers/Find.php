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

        $this->table = false;
    }

    public function sortMaut()
    {
        // $this->criterias = Criteria::all();
        // $this->criteria = collect();

        // $this->categories = Creation::globalCategory();
        // $this->category = collect();
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

        $this->photographers = User::photographerScore();

        $alternativeScores = [];
        foreach ($this->photographers as $photographer) {
            $i = 0;
            foreach ($photographer->scores as $score) {
                $alternativeScores[] = $score->score;
                $normalizeScore[] = (($score->score - $minCriteria[$i]) / ($maxCriteria[$i] - $minCriteria[$i]));
                $i++;
            }
        }
        dd($normalizeScore);
    }

    public function render()
    {
        return view('livewire.photographers.find');
    }
}
