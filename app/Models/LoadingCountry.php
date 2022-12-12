<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadingCountry extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = "loading_countries";
    protected $fillable = ['country','state','port','terminal'];
    // protected $guarded = [];
}
