<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoOfVehicle extends Model
{
    use HasFactory;
    use HasFactory;   
    protected $primaryKey = 'id';
    protected $table = "no_of_vehicles";
    protected $guarded = [];
}
