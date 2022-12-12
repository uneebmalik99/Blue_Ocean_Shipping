<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "documents";
    protected $fillable = [
        'name',
        'thumbnail',
        'normal',
        'is_deleted',
        'vehicle_id',
        'invoice_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
