<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class LoadingPort extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $primaryKey = 'id';
    protected $table = "loading_ports";
    protected $guarded = [];

    public function states()
    {
        return $this->belongsTo('App\Models\State', 'state_id', 'id');
    }
    public function loadingTerminal(){
        return $this->hasMany('App\Models\LoadingTerminal', 'loadingport_id', 'id');
    }
}
