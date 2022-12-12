<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\LockableTrait;
class User extends Authenticatable
{
    use HasFactory;
    use HasRoles;
    use LockableTrait;
    // use softDeletes;
    protected $primaryKey = 'id';
    protected $table = "user";
    protected $guarded = [];

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle', 'buyer_id', 'id');
    }

    public function customer_documents()
    {
        return $this->hasMany('App\Models\CustomerDocument', 'user_id', 'id');
    }

    public function exports()
    {
        return $this->hasMany('App\Models\Export');
    }

    public function locations()
    {
        return $this->hasMany('App\Models\Location');
    }

    public function consignees()
    {
        return $this->hasMany('App\Models\Consignee');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    public function auth_assignment()
    {
        return $this->hasOne('App\Models\AuthAssignment');
    }
    // public function role()
    // {
    //     return $this->belongsTo('App\Models\role');
    // }

    public function documents()
    {
        return $this->hasOne('App\Models\CustomerDocument');
    }

    public function billings()
    {
        return $this->hasMany('App\Models\BillingParty', 'customer_id', 'id');
    }

    public function shippers()
    {
        return $this->hasMany('App\Models\Shipper', 'customer_id', 'id');
    }

    public function quotations()
    {
        return $this->hasMany('App\Models\Quotation', 'customer_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification', 'customer_id', 'id');
    }
    public function buyer_id(){
        return $this->hasMany('App\Models\CustomerBuyerId', 'customer_id', 'id');
    }
}
