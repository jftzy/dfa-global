<?php

namespace App\Http\Controllers\Api\V1;

use DB;
use Illuminate\Http\Request;
use App\Models\Accomplishment;
use App\Models\Translation;
use App\Models\CulturalEventsAndTargetAudiences;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function statsLoad() {

        $data = DB::select('
                        select c.name as country, a.id, a.title, a.month, a.year, a.quarter, a.project_type, a.project_classification, a.foreign_policy_pillar, a.target_audience, a.strategic_plan, a.diplomacy, a.cultural_domains, a.attached_file
                        from accomplishments as a
                        inner join countries as c on c.id = a.country_id
                        where c.id = a.country_id ORDER BY a.created_at DESC');

        return response()->json([
            'data' => $data
        ], 200);
    }

    public function eventsLoad() {

        $data = CulturalEventsAndTargetAudiences::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'data' => $data
        ], 200);
    }

    public function translationsLoad() {

        $data = Translation::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'data' => $data
        ], 200);
    }
}
