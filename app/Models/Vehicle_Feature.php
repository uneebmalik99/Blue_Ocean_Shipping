<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Vehicle_Feature extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'vehicle__features';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'vehicle_id',
        'feature_id',
        'value',
    ];
}
