<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationCountry extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "destination_countries";
    protected $guarded = [];

    public function state()
    {
        return $this->hasMany(DestinationState::class, 'country_id', 'id');
    }

}
