<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $primaryKey = 'id';
    protected $table = "series";
    protected $guarded = [];

    public function model()
    {
        return $this->belongsTo('App\Models\VehicleModel', 'model_id', 'id');
    }
}
