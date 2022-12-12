<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Condition extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "conditions";
    protected $fillable = [
        'name',
    ];

    public function vehicles()
    {
        return $this->belongsToMany('App\Models\Vehicle');
    }
}
