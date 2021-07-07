<?php

namespace App\Http\Livewire\Schedules;

use App\Models\User;
use Livewire\Component;
use App\Models\Schedule;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class Index extends Component
{

    public $query = '';

    public function getSchedulesProperty()
    {
        $schedules = Schedule::query()
            ->with(['customer', 'photographer', 'detail'])
            ->when(User::with('roles')->find(auth()->id())->roles->first()->name == 'photographer', function ($query) {
                return $query->where('photographer_id', auth()->id());
            })
            ->when(User::with('roles')->find(auth()->id())->roles->first()->name == 'customer', function ($query) {
                return $query
                    ->where('customer_id', auth()->id());
            })
            ->where('is_confirmed', 1)
            ->when(auth()->user()->roles->first()->name == 'photographer', function ($q) {
                return $q->whereHas('detail', function ($q) {
                    return $q->where('name', 'like', "%$this->query%");
                });
            })
            ->when(auth()->user()->roles->first()->name == 'customer', function ($q) {
                return $q->whereHas('photographer', function ($q) {
                    return $q->where('name', 'like', "%$this->query%");
                });
            })
            ->orWhere('date', 'like', "%$this->query%")
            ->latest()
            ->get();
        return $schedules;
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
