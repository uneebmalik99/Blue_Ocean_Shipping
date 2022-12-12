<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationTerminal extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "destination_terminals";
    protected $guarded = [];

    public function states()
    {
        return $this->belongsTo('App\Models\DestinationState', 'state_id', 'id');
    }
    public function destinationterminal(){
        return $this->hasMany('App\Models\DestinationTerminal');
    }
}
