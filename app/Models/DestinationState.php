<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationState extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $primaryKey = 'id';
    protected $table = "destination_states";
    protected $guarded = [];

    public function destination_country()
    {
        return $this->belongsTo(DestinationCountry::class, 'country_id', 'id');
    }
    public function destination_port(){
        return $this->hasMany('App\Models\DestinationPort', 'state_id', 'id');
    }
}
