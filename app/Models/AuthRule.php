<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class AuthRule extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'auth_rules';
    protected $primaryKey = 'name';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'data',
    ];
}
