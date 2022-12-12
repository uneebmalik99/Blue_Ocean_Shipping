<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "vehicles";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'buyer_id', 'id');
    }
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'inovice_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'title_state', 'id');
    }

    public function document()
    {
        return $this->hasOne('App\Models\Document');
    }

    public function towing_request()
    {
        return $this->belongTo('App\Models\Towing_Request');
    }

    public function conditions()
    {
        return $this->belongsToMany('App\Models\Condition');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function features()
    {
        return $this->belongsToMany('App\Models\Feature');
    }

    public function sticky_notes()
    {
        return $this->hasMany('App\Models\StickyNote');
    }

    public function vehicle_status()
    {
        return $this->belongsTo('App\Models\VehicleStatus', 'status', 'id');
    }

    public function auction_image()
    {
        return $this->hasMany('App\Models\AuctionImage', 'vehicle_id', 'id');
    }

    public function warehouse_image()
    {
        return $this->hasMany('App\Models\WarehouseImage', 'vehicle_id', 'id');
    }

    public function auction_invoice()
    {
        return $this->hasOne('App\Models\AuctionInvoice', 'vehicle_id', 'id');
    }

    public function shipment()
    {
        return $this->belongsTo('App\Models\Shipment');
    }

    public function billofsales()
    {
        return $this->hasMany('App\Models\BillOfSale', 'vehicle_id', 'id');
    }

    public function originaltitles()
    {
        return $this->hasMany('App\Models\OriginalTitle', 'vehicle_id', 'id');
    }

    public function pickupimages()
    {
        return $this->hasMany('App\Models\PickupImage', 'vehicle_id', 'id');
    }

    public function vehicle_cart(){
        return $this->hasMany('App\Models\VehicleCart', 'vehicle_id', 'id');
    }
}
