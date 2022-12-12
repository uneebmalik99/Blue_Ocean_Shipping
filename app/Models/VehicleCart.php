<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "vehicle_carts";
    protected $guarded = [];

    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }
}
