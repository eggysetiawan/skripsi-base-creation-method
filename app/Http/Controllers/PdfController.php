<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function schedule(Schedule $schedule)
    {
        $data['schedule'] = $schedule->load(['customer', 'photographer', 'detail']);
        $pdf = PDF::loadView('schedules.pdf', $data);
        $pdf->setPaper('a4', 'potrait');
        $pdf->setWarnings(false);
        return $pdf->stream('Schedule_Report.pdf');
    }
}
