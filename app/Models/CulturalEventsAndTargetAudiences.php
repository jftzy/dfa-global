<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CulturalEventsAndTargetAudiences extends Model
{
    protected $fillable = [
        'host_communities',
        'filipino_communities',
        'other_stakeholders',
        'title_of_the_event',
        'short_description',
        'date_from',
        'date_to'
    ];




}