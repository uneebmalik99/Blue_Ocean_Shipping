<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other_Document extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function shipment(){
        return $this->belongsTo('App\Models\Shipment', 'shipment_id', 'id');
    }
}
