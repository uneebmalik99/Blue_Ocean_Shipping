<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentStatus extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "shipment_statuses";
    protected $guarded = [];

    public function shipments()
    {
        return $this->hasMany('App\Models\Shipment');
    }

}
