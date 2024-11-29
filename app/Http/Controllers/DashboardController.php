<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index() {

        // 1st Quarter
        $barchart1AC = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 1)
                                        ->whereIn('accomplishments.month', ['january', 'february', 'march'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart1Eu = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 2)
                                        ->whereIn('accomplishments.month', ['january', 'february', 'march'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart1MA = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 3)
                                        ->whereIn('accomplishments.month', ['january', 'february', 'march'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();
        $barchart1AP = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 4)
                                        ->whereIn('accomplishments.month', ['january', 'february', 'march'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        // 2nd Quarter
        $barchart2AC = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 1)
                                        ->whereIn('accomplishments.month', ['april', 'may', 'june'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart2Eu = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 2)
                                        ->whereIn('accomplishments.month', ['april', 'may', 'june'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart2MA = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 3)
                                        ->whereIn('accomplishments.month', ['april', 'may', 'june'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart2AP = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 4)
                                        ->whereIn('accomplishments.month', ['april', 'may', 'june'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        // 3rd Quarter
        $barchart3AC = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 1)
                                        ->whereIn('accomplishments.month', ['july', 'august', 'september'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart3Eu = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 2)
                                        ->whereIn('accomplishments.month', ['july', 'august', 'september'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart3MA = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 3)
                                        ->whereIn('accomplishments.month', ['july', 'august', 'september'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart3AP = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 4)
                                        ->whereIn('accomplishments.month', ['july', 'august', 'september'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        // 4th Quarter
        $barchart4AC = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 1)
                                        ->whereIn('accomplishments.month', ['october', 'november', 'december'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart4Eu = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 2)
                                        ->whereIn('accomplishments.month', ['october', 'november', 'december'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart4MA = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 3)
                                        ->whereIn('accomplishments.month', ['october', 'november', 'december'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        $barchart4AP = DB::table('accomplishments')->where('accomplishments.year', date('Y'))
                                        ->where('regions.id', 4)
                                        ->whereIn('accomplishments.month', ['october', 'november', 'december'])
                                        ->join('countries', 'countries.id', 'country_id')
                                        ->join('regions', 'regions.id', 'countries.region_id')
                                        ->get();

        // count
        $barchart1AC = count($barchart1AC);
        $barchart1Eu = count($barchart1Eu);
        $barchart1MA = count($barchart1MA);
        $barchart1AP = count($barchart1AP);
        $barchart2AC = count($barchart2AC);
        $barchart2Eu = count($barchart2Eu);
        $barchart2MA = count($barchart2MA);
        $barchart2AP = count($barchart2AP);
        $barchart3AC = count($barchart3AC);
        $barchart3Eu = count($barchart3Eu);
        $barchart3MA = count($barchart3MA);
        $barchart3AP = count($barchart3AP);
        $barchart4AC = count($barchart4AC);
        $barchart4Eu = count($barchart4Eu);
        $barchart4MA = count($barchart4MA);
        $barchart4AP = count($barchart4AP);

        return view('dashboard' , compact(
                        'barchart1AC',
                        'barchart1Eu',
                        'barchart1MA',
                        'barchart1AP',
                        'barchart2AC',
                        'barchart2Eu',
                        'barchart2MA',
                        'barchart2AP',
                        'barchart3AC',
                        'barchart3Eu',
                        'barchart3MA',
                        'barchart3AP',
                        'barchart4AC',
                        'barchart4Eu',
                        'barchart4MA',
                        'barchart4AP'
                    ));
    }
}
