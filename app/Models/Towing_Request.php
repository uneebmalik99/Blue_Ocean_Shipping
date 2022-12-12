<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class towing_request extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "towing_requests";
    protected $fillable = [
        'condition',
        'damaged',
        'pictures',
        'towed',
        'title_recieved',
        'title_recieved_date',
        'title_number',
        'title_state',
        'towing_request_date',
        'pickup_date',
        'deliver_date',
        'note',
        'title_type',
    ];

    public function vehicle()
    {
        $this->hasOne('App\Models\Vehicle');
    }
}
