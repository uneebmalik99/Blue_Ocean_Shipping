<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Note extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'notes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'description',
        'export_id',
        'image_url',
        'vehicle_id',
    ];

    public function export()
    {
        return $this->belongsTo('App\Models\Export');
    }
}
