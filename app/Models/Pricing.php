<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Pricing extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'pricings';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'upload_file',
        'month',
        'princing_type',
        'status',
        'description',
        'added_by_role',
    ];
}
