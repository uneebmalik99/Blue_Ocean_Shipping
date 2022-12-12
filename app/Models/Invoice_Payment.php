<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice_Payment extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = "invoice__payments";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'invoice_id',
        'export_id',
        'customer_id',
        'paid_amount',
        'remaining_amount',
        'note',
        'added_by_role',
    ];
}
