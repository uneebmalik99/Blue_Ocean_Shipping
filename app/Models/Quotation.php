<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "quotations";
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }
}
