<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationPort extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "destination_ports";
    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo('App\Models\DestinationState', 'state_id', 'id');
    }
    public function destinationterminal(){
        return $this->hasMany('App\Models\DestinationTerminal');
    }
}
