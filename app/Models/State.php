<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $primaryKey = 'id';
    protected $table = "states";
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(ShippingCountry::class, 'country_id', 'id');
    }
    public function loading_ports(){
        return $this->hasMany('App\Models\LoadingPort');
    }
}
