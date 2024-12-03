<?php

namespace App\Http\Controllers\Api\V1;

use DB;
use Illuminate\Http\Request;
use App\Models\Accomplishment;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function statsLoad() {

        $data = DB::select('
                        select c.name as country, a.title, a.month, a.year, a.quarter, a.project_type, a.project_classification, a.foreign_policy_pillar, a.target_audience, a.strategic_plan, a.diplomacy, a.cultural_domains
                        from accomplishments as a
                        inner join countries as c on c.id = a.country_id
                        where c.id = a.country_id ORDER BY a.created_at DESC');

        return response()->json([
            'data' => $data
        ], 200);
    }
}
