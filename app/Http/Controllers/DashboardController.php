<?php

namespace App\Http\Controllers;
use App\Models\Accomplishment;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class DashboardController extends Controller
{
    public function indexOld() {

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

    public function index($yr = null) {
        $year = $yr ?? date('Y');
        $data = DB::table('accomplishments')->where('accomplishments.year', $year)
                                        ->select('countries.name as country','regions.name as region',DB::raw('count(accomplishments.id) as total'))
                                        ->leftjoin('countries', 'countries.id', 'country_id')
                                        ->leftjoin('regions', 'regions.id', 'countries.region_id')
                                        ->groupBy('countries.name','regions.name')
                                        ->get();

        $r = "['Country', 'Total Submitted Report'],";
        foreach($data as $d){
            $r.="['".$d->country."', ".$d->total."],";
        }
        $r = rtrim($r,",");
        return view('dashboard',compact('r','year'));
    }

    public function get_data_per_country() {
        $yr = $_GET['yr'] ?? '';
        $country = null;
        if(strlen($_GET['country']) > 2)
            $country = Country::whereName($_GET['country'])->first();

        $qtr_qry = Accomplishment::groupBy('quarter')->select('quarter', DB::raw('count(*) as total'));
        if(strlen($_GET['country']) > 2)
            $qtr_qry->where('country_id',$country->id)->where('year',$yr);
        $qtr = $qtr_qry->get();

        $project_type_qry = Accomplishment::groupBy('project_type')->select('project_type', DB::raw('count(*) as total'));
        if(strlen($_GET['country']) > 2)
            $project_type_qry->where('country_id',$country->id)->where('year',$yr);
        $project_type = $project_type_qry->get();

        $project_classification_qry = Accomplishment::groupBy('project_classification')->select('project_classification', DB::raw('count(*) as total'));
        if(strlen($_GET['country']) > 2)
            $project_classification_qry->where('country_id',$country->id)->where('year',$yr);
        $project_classification = $project_classification_qry->get();

        $foreign_policy_pillar_qry = Accomplishment::groupBy('foreign_policy_pillar')->select('foreign_policy_pillar', DB::raw('count(*) as total'));
        if(strlen($_GET['country']) > 2)
            $foreign_policy_pillar_qry->where('country_id',$country->id)->where('year',$yr);
        $foreign_policy_pillar = $foreign_policy_pillar_qry->get();


        return response()->json([
            'project_type' => $project_type,
            'project_classification' => $project_classification,
            'foreign_policy_pillar' => $foreign_policy_pillar,
            'qtr' => $qtr,
        ]);
      
    }

    public function get_data_per_region() {
        $yr = $_GET['yr'] ?? '';
        $region = null;
       
            $region = Region::whereId($_GET['region'])->first();

        $qtr_qry = DB::table('accomplishments')
            ->select('accomplishments.quarter',DB::raw('count(accomplishments.id) as total'))
            ->leftjoin('countries', 'countries.id', 'country_id')
            ->leftjoin('regions', 'regions.id', 'countries.region_id')
            ->groupBy('accomplishments.quarter');
       
            $qtr_qry->where('countries.region_id',$region->id)->where('accomplishments.year',$yr);
        $qtr = $qtr_qry->get();


        $project_type_qry = DB::table('accomplishments')
            ->select('accomplishments.project_type','countries.name as country',DB::raw('count(accomplishments.id) as total'))
            ->leftjoin('countries', 'countries.id', 'country_id')
            ->leftjoin('regions', 'regions.id', 'countries.region_id')
            ->groupBy('accomplishments.project_type','countries.name');
  
            $project_type_qry->where('countries.region_id',$region->id)->where('accomplishments.year',$yr);
        $project_type = $project_type_qry->get();
      

        $project_classification_qry = DB::table('accomplishments')
            ->select('accomplishments.project_classification','countries.name as country',DB::raw('count(accomplishments.id) as total'))
            ->leftjoin('countries', 'countries.id', 'country_id')
            ->leftjoin('regions', 'regions.id', 'countries.region_id')
            ->groupBy('accomplishments.project_classification','countries.name');
     
            $project_classification_qry->where('countries.region_id',$region->id)->where('accomplishments.year',$yr);
        $project_classification = $project_classification_qry->get();
      

        $foreign_policy_pillar_qry = DB::table('accomplishments')
            ->select('accomplishments.foreign_policy_pillar','countries.name as country',DB::raw('count(accomplishments.id) as total'))
            ->leftjoin('countries', 'countries.id', 'country_id')
            ->leftjoin('regions', 'regions.id', 'countries.region_id')
            ->groupBy('accomplishments.foreign_policy_pillar','countries.name');
      
            $foreign_policy_pillar_qry->where('countries.region_id',$region->id)->where('accomplishments.year',$yr);
        $foreign_policy_pillar = $foreign_policy_pillar_qry->get();
     
        return response()->json([
            'project_type' => $project_type,
            'project_classification' => $project_classification,
            'foreign_policy_pillar' => $foreign_policy_pillar,
            'qtr' => $qtr,
        ]);
      
    }
}
