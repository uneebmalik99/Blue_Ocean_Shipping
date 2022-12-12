<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupLocation extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "pickup_location";
    protected $guarded = [];
}
