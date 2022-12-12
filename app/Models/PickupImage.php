<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PickupImage extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "pickup_images";
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }}
