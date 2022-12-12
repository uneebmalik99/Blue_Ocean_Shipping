<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "invoice_images";
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }
}
