<?php

namespace App\Http\Livewire\Schedules;

use Livewire\Component;
use App\Models\Schedule;
use App\Events\OrderCreated;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    public $schedule;

    public $photographerMaut;
    public $dateMaut;
    public $startMaut;
    public $endMaut;
    public $noteMaut;
    public $nameMaut;
    public $mobileMaut;
    public $emailMaut;

    protected $rules = [
        'dateMaut' => ['date', 'after_or_equal:today'],
        'startMaut' => ['required'],
        'endMaut' => ['required'],
        'noteMaut' => ['nullable'],
        'nameMaut' => ['required', 'string'],
        'mobileMaut' => ['required', 'digits_between:9,13'],
        'emailMaut' => ['required', 'email'],
    ];


    public function editMaut()
    {
        // dd($this->schedule->photographer->name);
        $this->photographerMaut = $this->schedule->photographer->name;
        $this->dateMaut = $this->schedule->date;
        $this->startMaut = $this->schedule->detail->start;
        $this->endMaut = $this->schedule->detail->end;
        $this->nameMaut = $this->schedule->detail->name;
        $this->mobileMaut = $this->schedule->detail->mobile;
        $this->emailMaut = $this->schedule->detail->email;
        $this->noteMaut = $this->schedule->detail->note;
    }

    public function mount()
    {
        $this->photographerMaut = $this->schedule->photographer->name;
        $this->dateMaut = $this->schedule->date;
        $this->startMaut = $this->schedule->detail->start;
        $this->endMaut = $this->schedule->detail->end;
        $this->nameMaut = $this->schedule->detail->name;
        $this->mobileMaut = $this->schedule->detail->mobile;
        $this->emailMaut = $this->schedule->detail->email;
        $this->noteMaut = $this->schedule->detail->note;
    }

    public function orderApproval()
    {
        $this->schedule->update([
            'is_approved' => 1,
        ]);
        session()->flash('success', 'Pesanan telah berhasil di approve!');
        return redirect('schedules');
    }

    public function rejectOrder()
    {
        $this->schedule->update([
            'is_approved' => 2,
        ]);
        session()->flash('success', 'Pesanan telah berhasil di reject!');
        return redirect('schedules');
    }

    public function confirmOrder()
    {
        DB::transaction(function () {
            $this->schedule->update([
                'is_confirmed' => 1,
            ]);
            event(new OrderCreated($this->schedule));
        });

        session()->flash('success', 'Permintaan booking telah dikirimkan ke fotografer');
        return redirect('schedules');
    }

    public function updateMaut()
    {
        $this->validate();


        $this->schedule->update([
            'date' => $this->dateMaut,
        ]);

        $this->schedule->detail()->update([
            'name' => $this->nameMaut,
            'mobile' => $this->mobileMaut,
            'email' => $this->emailMaut,
            'start' => $this->startMaut,
            'end' => $this->endMaut,
            'note' => $this->noteMaut
        ]);

        session()->flash('success', 'Permintaan booking telah dikirimkan ke fotografer');
        return redirect()->route('schedules.show', $this->schedule->id);
    }

    public function render()
    {
        return view('livewire.schedules.edit');
    }
}
