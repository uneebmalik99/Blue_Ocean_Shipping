<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "customers";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }

    public function exports()
    {
        return $this->hasMany('App\Models\Export');
    }

    public function customer_documents()
    {
        return $this->hasMany('App\Models\Customer_Document');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    public function billings()
    {
        return $this->hasMany('App\Models\BillingParty');
    }

    public function shippers()
    {
        return $this->hasMany('App\Models\Shipper');
    }

    public function quotations()
    {
        return $this->hasMany('App\Models\Quotation');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }
}
