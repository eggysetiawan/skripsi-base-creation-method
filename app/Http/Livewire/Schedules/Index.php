<?php

namespace App\Http\Livewire\Schedules;

use Livewire\Component;
use App\Models\Schedule;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class Index extends Component
{

    public function getSchedulesProperty()
    {
        $schedules = Schedule::getSchedules();
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
