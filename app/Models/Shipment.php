<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "shipments";
    protected $guarded = [];

    public function consignee()
    {
        return $this->belongsTo('App\Models\Consignee');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\ShipmentStatus', 'status', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ShipmentImage');
    }

    public function vehicle()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
    public function shipment_invoice(){
        return $this->hasMany('App\Models\Shipment_Invice');
    }
    public function stamp_titles(){
        return $this->hasMany('App\Models\Stamp_Title','shipment_id', 'id');
    }
    public function loading_image(){
        return $this->hasMany('App\Models\Loading_Image', 'shipment_id', 'id');
    }
    public function other_documents(){
        return $this->hasMany('App\Models\Other_Document', 'shipment_id','id');
    }
}
