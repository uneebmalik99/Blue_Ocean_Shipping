<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class AuthItemChild extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'auth_item_child';
    protected $primaryKey = ['parent', 'child'];
    public $timestamps = true;
    protected $fillable = [
        'parent',
        'child',
    ];

}
