<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Region extends Model
{
    protected $fillable = [
        'name'
    ];

    public function country() {
        return $this->hasMany(Country::class, 'region_id', 'id');
    }

}
