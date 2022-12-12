<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Audit extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'audits';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'datetime',
        'logs',
    ];

}
