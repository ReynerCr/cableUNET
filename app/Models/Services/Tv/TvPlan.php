<?php

namespace App\Models\Services\Tv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvPlan extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
