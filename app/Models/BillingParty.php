<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingParty extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "billing_parties";
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id', 'id');
    }
}
