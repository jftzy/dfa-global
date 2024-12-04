<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Accomplishment;
use App\Models\CulturalEventsAndTargetAudiences;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function accomplishments() {

        // $data_events = CulturalEventsAndTargetAudiences::all();
        // dd($data_stats);

        // $data = DB::table('accomplishments as a')
        //             ->select (
        //                     'c.name as country',
        //                     'a.title', 'a.month', 
        //                     'a.year', 'a.quarter', 
        //                     'a.project_type', 
        //                     'a.project_classification', 
        //                     'a.foreign_policy_pillar', 
        //                     'a.target_audience', 
        //                     'a.strategic_plan', 
        //                     'a.diplomacy', 
        //                     'a.cultural_domains'
        //                     )
        //             ->join('countries as c', 'c.id', '=', DB::raw("CAST('a.country_id' AS integer)"))
        //             ->where('c.id', 'a.country_id')
        //             ->get();

        // $data = DB::select('
        //                 select c.name as country, a.title, a.month, a.year, a.quarter, a.project_type, a.project_classification, a.foreign_policy_pillar, a.target_audience, a.strategic_plan, a.diplomacy, a.cultural_domains
        //                 from accomplishments as a
        //                 inner join countries as c on c.id = a.country_id
        //                 where c.id = a.country_id
        //             ');

        // dd($data);

        // $stats_data = DB::select(`SELECT (CASE  project_type 
        //                             WHEN  'Recurring'    
        //                             THEN 1
        //                             ELSE 0 
        //                             END) AS is_recurring,
        //                             (CASE project_type
        //                             WHEN 'Flagship' 
        //                             THEN 1
        //                             ELSE 0
        //                             END) AS is_flagship,
        //                             (CASE project_type
        //                             WHEN 'One Time'
        //                             THEN 1
        //                             ELSE 0
        //                             END) AS is_onetime, *
        //                             FROM accomplishments`);
        if(isset($_GET['year'])){
            //$stats = Accomplishment::where('year',$_GET['year'])->where('region');
            $stats = \DB::table('accomplishments')->where('accomplishments.year', $_GET['year'])->where('regions.id', $_GET['region'])
                                        ->select('countries.name as country','regions.name as region','accomplishments.*')
                                        ->leftjoin('countries', 'countries.id', 'country_id')
                                        ->leftjoin('regions', 'regions.id', 'countries.region_id')                                        
                                        ->get();
        }
        else{
            $stats = \DB::table('accomplishments')
                                        ->select('countries.name as country','regions.name as region','accomplishments.*')
                                        ->leftjoin('countries', 'countries.id', 'country_id')
                                        ->leftjoin('regions', 'regions.id', 'countries.region_id')->limit(20)->orderBy('id','desc')
                                        ->get();
        }

        return view('reports.accomplishments', compact('stats'));

    }

    public function events() {
        return view('reports.events');
    }

    public function translations() {
        return view('reports.translations');
    }
}
