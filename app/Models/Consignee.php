<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consignee extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "consignees";
    protected $fillable = [
        'customer_user_id',
        'consignee_name',
        'consignee_address_1',
        'consignee_address_2',
        'city',
        'state',
        'country',
        'zip_code',
        'phone',
        'cargo_details',
        'added_by_role',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }
    public function shipments()
    {
        return $this->belongsToMany(shipments::class);
    }
}
