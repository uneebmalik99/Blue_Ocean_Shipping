<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipperName extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "shipper_name";
    protected $guarded = [];
}
