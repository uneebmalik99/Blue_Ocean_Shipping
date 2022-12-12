<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleStatus extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "vehicle_status";
    protected $guarded = [];

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
}
