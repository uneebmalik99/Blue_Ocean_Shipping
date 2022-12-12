<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "locations";
    protected $fillable = [
        'name',
        'zip_code',
        'added_by_role',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
}
