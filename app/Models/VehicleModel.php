<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $primaryKey = 'id';
    protected $table = "vehicle_models";
    protected $guarded = [];

    public function series()
    {
        return $this->hasMany('App\Models\Series', 'model_id', 'id');
    }
    public function make(){
        return $this->belongsTo('App\Models\Make', 'make_id', 'id');
    }
}

