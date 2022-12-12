<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentImage extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "shipment_images";
    protected $guarded = [];

    public function shipment()
    {
        return $this->belongsTo('App\Models\Shipment', 'shipment_id', 'id');
    }
}
