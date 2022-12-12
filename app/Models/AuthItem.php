<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class AuthItem extends Model
{
    use HasFactory;
    use softDeletes;
    protected $talbe = 'auth_items';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'type',
        'description',
        'rule_name',
        'data',
    ];
}
