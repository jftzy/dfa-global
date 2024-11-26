<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    protected $fillable = [
        'name',
        'region_id'
    ];

    public function accomplishment() {
        return $this->belongsTo(Accomplishment::class, 'country_id', 'id');
    }

    public function region() {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
