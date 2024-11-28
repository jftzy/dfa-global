<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accomplishment;
use App\Models\CulturalEventsAndTargetAudiences;
use DB;

class ReportsController extends Controller
{
    public function index() {

        $data_stats = Accomplishment::all();
        $data_events = CulturalEventsAndTargetAudiences::all();

        return view('reports.index', compact(
            'data_stats',
            'data_events'
        ));

    }
}
