<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "warehouse_images";
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

}
