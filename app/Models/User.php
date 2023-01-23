<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\LockableTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasFactory,HasRoles,LockableTrait,Notifiable,HasApiTokens;
    // use HasRoles;
    // use LockableTrait;
    // use Notifiable;
    // use softDeletes;
    protected $primaryKey = 'id';
    protected $table = "users";
    protected $guarded = [];
      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];    

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle', 'customer_name', 'id');
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

    public function shipment()
    {
        return $this->hasMany('App\Models\Shipment', 'select_consignee', 'id');
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
        return $this->hasMany('App\Models\Notification', 'user_id', 'id');
    }
    public function buyer_id(){
        return $this->hasMany('App\Models\CustomerBuyerId', 'customer_id', 'id');
    }
}
