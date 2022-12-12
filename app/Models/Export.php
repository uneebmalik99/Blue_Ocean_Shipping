<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Export extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "exports";
    protected $fillable = [
        'export_date',
        'loading_date',
        'broker_name',
        'booking_number',
        'eta',
        'ar_number',
        'xtn_number',
        'seal_number',
        'container_number',
        'cutt_off',
        'vessel',
        'voyage',
        'terminal',
        'streamline_ship',
        'destination',
        'itn',
        'contact_details',
        'special_instruction',
        'container_type',
        'port_of_loading',
        'port_of_discharge',
        'export_invoice',
        'note',
        'export_is_deleted',
        'added_by_role',
        'customer_user_id',
        'notes_status',
        'oti_number',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    public function export_images()
    {
        return $this->hasMany('App\Models\Export_Image');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    public function dock_receipt()
    {
        return $this->hasOne('App\Models\DockReceipt');
    }
}
