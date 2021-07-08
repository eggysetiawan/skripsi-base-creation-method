<?php

namespace App\Http\Livewire\Schedules;

use App\Models\User;
use Livewire\Component;
use App\Models\Schedule;

class Index extends Component
{

    public $query = '';

    public function getSchedulesProperty()
    {
        return Schedule::query()
            ->with(['customer', 'photographer', 'detail'])
            ->when(auth()->user()->roles->first()->name == 'photographer', function ($query) {
                return $query->where('photographer_id', auth()->id())
                    ->whereHas('detail', function ($q) {
                        return $q->where('name', 'like', "%$this->query%");
                    });
            })
            ->when(auth()->user()->roles->first()->name == 'customer', function ($query) {
                return $query->where('customer_id', auth()->id())
                    ->whereHas('photographer', function ($q) {
                        return $q->where('name', 'like', "%$this->query%");
                    });
            })->get();
    }

    public function hasDonePhotographer(Schedule $schedule)
    {
        $schedule->update(
            [
                'already_done' => 1,
            ]
        );
        $waitingForConfirmation = 'Menunggu konfirmasi dari customer';
        if ($schedule->already_done_customer) {
            $waitingForConfirmation = '';
        }
        session()->flash('success', 'Status pesanan sudah di update!' . $waitingForConfirmation);
        return back();
    }

    public function hasDoneCustomer(Schedule $schedule)
    {
        $schedule->update(
            [
                'already_done_customer' => 1,
            ]
        );
        $waitingForConfirmation = 'Menunggu konfirmasi dari photographer';
        if ($schedule->already_done) {
            $waitingForConfirmation = '';
        }
        session()->flash('success', 'Status pesanan sudah di update!' . $waitingForConfirmation);
        return back();
    }

    public function orderApproval(Schedule $schedule)
    {
        $schedule->update([
            'is_approved' => 1,
        ]);
        session()->flash('success', 'Pesanan telah berhasil di approve!');
        return back();
    }

    public function render()
    {
        return view('livewire.schedules.index', [
            'schedules' => $this->schedules,
        ]);
    }
}
