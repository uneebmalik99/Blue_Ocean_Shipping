<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentType extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "shipment_types";
    protected $guarded = [];
}
