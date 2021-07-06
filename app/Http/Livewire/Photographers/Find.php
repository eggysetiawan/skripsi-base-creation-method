<?php

namespace App\Http\Livewire\Photographers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Creation;
use App\Models\Criteria;
use App\Models\Schedule;
use App\Models\Score;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
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

    // maut modal
    public $photographerMaut;
    public $dateMaut;
    public $startMaut;
    public $endMaut;
    public $noteMaut;
    public $nameMaut;
    public $mobileMaut;
    public $emailMaut;
    // public $dateWeighted;

    protected $rules = [
        'dateMaut' => ['date', 'after_or_equal:today'],
        'startMaut' => ['required'],
        'endMaut' => ['required'],
        'noteMaut' => ['nullable'],
        'nameMaut' => ['required', 'string'],
        'mobileMaut' => ['required', 'digits_between:9,13'],
        'emailMaut' => ['required', 'email'],
    ];



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

        $this->dateMaut = date('Y-m-d');
        // $this->dateWeighted = date('Y-m-d');

        $this->table = false;
    }

    public function editMaut($name)
    {
        $this->photographerMaut = $name;
        $this->dateMaut = date('Y-m-d');
        $this->startMaut = date('H:i');
        $this->endMaut = date('H:i', strtotime('+2hour'));
        $this->nameMaut = auth()->user()->name;
        $this->mobileMaut = auth()->user()->mobile;
        $this->emailMaut = auth()->user()->email;
    }

    public function orderMaut(User $user)
    {
        $this->validate();


        DB::transaction(function () use ($user) {
            $schedule = Schedule::create([
                'customer_id' => auth()->id(),
                'photographer_id' => $user->id,
                'date' => $this->dateMaut,
                'is_maut' => 1
            ]);

            $schedule->detail()->create([
                'name' => $this->nameMaut,
                'mobile' => $this->mobileMaut,
                'email' => $this->emailMaut,
                'start' => $this->startMaut,
                'end' => $this->endMaut,
                'note' => $this->noteMaut
            ]);
            return redirect()->route('schedules.show', $schedule->id);
        });
    }


    public function sortMethod()
    {
        $this->table = true;
        $this->criteriaCollections = $this->getCriteriaCollection();

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
                    'id' => $score['id'],
                    'name' => $score['name'],
                    'preference' => $score['preference'],
                    'username' => $score['username'],
                ];
            }

            foreach ($preferenceScoreWeighted as $score) {
                $sortByWeighted[] = [
                    'id' => $score['id'],
                    'name' => $score['name'],
                    'preference' => $score['preference'],
                    'username' => $score['username'],
                ];
            }

            $this->mauts = $sortByMaut;
            $this->weighteds = $sortByWeighted;
        }
    }



    public function getCriteriaCollection()
    {
        return collect([
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
    }

    public function render()
    {
        return view('livewire.photographers.find');
    }
}
