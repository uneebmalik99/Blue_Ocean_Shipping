<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "auction_images";
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehilce', 'vehicle_id', 'id');
    }

}
