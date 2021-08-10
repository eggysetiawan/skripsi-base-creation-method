<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\ScheduleReport;
use Illuminate\Database\Seeder;

class ScheduleReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedules = Schedule::with('photographer')->get();

        foreach ($schedules as $schedule) {
            ScheduleReport::create([
                'user_id' => $schedule->photographer_id,
                'name' => $schedule->photographer->name,
                'date' => $schedule->date,
                'created_at' => $schedule->created_at,
                'updated_at' => $schedule->updated_at,
            ]);
        }
    }
}
