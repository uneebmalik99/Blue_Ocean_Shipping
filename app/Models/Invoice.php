<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "invoices";
    protected $guarded = [];

    public function export()
    {
        return $this->belongsTo('App\Models\Export');
    }

    public function vehicle()
    {
        return $this->hasMany('App\Models\Vehicle', 'inovice_id', 'id');
    }


    public function consignee()
    {
        return $this->belongsTo('App\Models\Consignee');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','customer_user_id','id');
    }
}
