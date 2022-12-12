<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCountry extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "shipping_countries";
    protected $guarded = [];
    public function state()
    {
        return $this->hasMany(State::class, 'country_id', 'id');
    }
}
