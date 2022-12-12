<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBuyerId extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "customer_buyer_ids";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User', 'customer_id', 'id');
    }
}
