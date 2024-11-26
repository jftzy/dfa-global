<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accomplishment;

class ReportsController extends Controller
{
    public function index() {
        // $data = DB:table('accomplishment')->whereIn('month', ['january', 'february', 'march'])
        //                                 ->join('country', 'country.id', 'country_id')
        //                                 ->get();

        // dd($data);
        $data = Accomplishment::all();

        return view('reports.index', compact(
            'data'
        ));
    }

    public function regionQuarterOne() {

        $data = Accomplishment::whereIn('month', 
                                [
                                    'january', 
                                    'february', 
                                    'march'
                                ])
                                ->get();

        dd($data);
    }
}
