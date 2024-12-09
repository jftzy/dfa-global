<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Accomplishment extends Model
{
    protected $fillable = [
        'country_id',
        'title',
        'month',
        'year',
        'quarter',
        'project_type',
        'project_classification',
        'foreign_policy_pillar',
        'target_audience',
        'strategic_plan',
        'diplomacy',
        'cultural_domains',
        'file_url',
        'created_at'
    ];

    public function country() {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
