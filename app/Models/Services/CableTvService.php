<?php

namespace App\Models\Services;

use App\Models\Services\Tv\TvPlan;
use App\Models\Services\Tv\TvChannel;

class CableTvService extends Service
{
    public function channels()
    {
        return $this->belongsToMany(TvChannel::class, 'tv_plans', 'cable_tv_service_id', 'tv_channel_id');
    }
}
