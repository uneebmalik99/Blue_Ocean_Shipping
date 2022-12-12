<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public const Super_Admin = 1;
    public const Sub_Admin = 2;
    public const Location_Admin = 3;
    public const Customer = 4;
    public function user()
    {
        return $this->hasMany('App\Models\User');

    }
}
