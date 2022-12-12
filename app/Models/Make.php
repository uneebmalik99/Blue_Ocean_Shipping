<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;
    // use softDeletes;     
    protected $primaryKey = 'id';
    protected $table = "makes";
    protected $guarded = [];

    public function model()
    {
        return $this->hasMany('App\Models\VehicleModel');
    }

    
    // public function series()
    // {
    //     return $this->belongsTo('App\Models\VehicleModel','series_id','id');
    // }
}