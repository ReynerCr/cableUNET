<?php

namespace App\Models;

use App\Models\Services\CableTvService;
use App\Models\Services\InternetService;
use App\Models\Services\TelephonyService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'internet_service_id',
        'telephony_service_id',
        'cable_tv_service_id'
    ];

    public function internet_service()
    {
        return $this->belongsTo(InternetService::class);
    }
    public function telephony_service()
    {
        return $this->belongsTo(TelephonyService::class);
    }
    public function cable_tv_service()
    {
        return $this->belongsTo(CableTvService::class);
    }
}
