<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Export_Image extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'export__images';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'thumbnail',
        'export_id',
        'baseurl',
    ];

    public function export()
    {
        return $this->belongsTo('App\Models\Export');
    }
}
