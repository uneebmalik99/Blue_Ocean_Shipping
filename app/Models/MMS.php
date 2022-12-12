<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MMS extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "m_m_s";
    protected $guarded = [];
}
