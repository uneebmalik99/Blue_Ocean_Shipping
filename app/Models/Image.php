<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'images';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'thumbnail',
        'normal',
        'vehicle_id',
        'is_deleted',
        'base_url',
    ];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }
}
