<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippmentRate extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "shippment_rates";
    protected $guarded = [];
}
