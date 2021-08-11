<?php

namespace App\Http\Livewire\Schedules;

use App\Models\User;
use Livewire\Component;
use App\Models\Schedule;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\ScheduleReport;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class Index extends Component
{

    public $query = '';
    public $month = '';

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
            })
            ->when($this->month != '', function ($query) {
                return $query->whereMonth('date',  $this->month);
            })
            ->latest()
            ->get();
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
            $this->createReport($schedule);
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
            $this->createReport($schedule);
        }
        session()->flash('success', 'Status pesanan sudah di update!' . $waitingForConfirmation);
        return back();
    }

    public function createReport($schedule)
    {
        return  ScheduleReport::create([
            'user_id' => $schedule->photographer_id,
            'name' => $schedule->photographer->name,
            'date' => $schedule->date,
        ]);
    }

    public function orderApproval(Schedule $schedule)
    {
        $schedule->update([
            'is_approved' => 1,
        ]);
        session()->flash('success', 'Pesanan telah berhasil di approve!');
        return back();
    }

    public function chart()
    {
        $schedules = Schedule::with('photographer.color')
            ->select('*', 'photographer_id as pg')
            ->groupByRaw('pg')
            ->get();

        foreach ($schedules as $schedule) {
            $photographers[] =
                [
                    'name' => ucfirst($schedule->photographer->name),
                    'condition' => 'user_id = ' . $schedule->photographer_id,
                    'color' => $schedule->photographer->color->name,
                    'fill' => true,
                ];
        }
        // dd($photographers);

        $chart_options = [
            'chart_type' => 'line',
            'chart_title' => 'Fotografer of the month',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\ScheduleReport',
            'conditions' => $photographers,
            'group_by_field'        => 'date',
            'group_by_period'       => 'month',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'amount',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
        ];
        return new LaravelChart($chart_options);
    }

    public function report()
    {
        if ($this->month == '') {
            $this->month = 13;
        }
        return redirect()->route('schedules.print', $this->month);
    }

    public function render()
    {

        return view('livewire.schedules.index', [
            'schedules' => $this->schedules,
            'chart1' => $this->chart(),
        ]);
    }
}
