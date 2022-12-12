<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Country extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    protected $table = "countries";
    protected $guarded = [];

    public function states()
    {
        return $this->hasMany('App\Models\State');
    }
}
