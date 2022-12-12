<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OriginalTitle extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "original_titles";
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }
}
