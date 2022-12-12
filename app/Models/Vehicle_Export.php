<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle_Export extends Model
{

    use HasFactory;
    use softDeletes;
    protected $table = "vehicle__exports";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'vehicle_id',
        'export_id',
        'customer_user_id',
        'custom_duty',
        'clearance',
        'towing',
        'shipping',
        'storage',
        'local',
        'others',
        'additional',
        'vat',
        'remarks',
        'title',
        'discount',
        'vehicle_export_is_deleted',
        'note_status',
        'exchange_rate',
        'ocean_charges',
    ];
}
