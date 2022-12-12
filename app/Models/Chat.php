<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "chats";
    protected $guarded = [];
    public function users(){
        return $this->belongsTo('App\Models\User','reciever_id','id');
    }
    // public function users()
    // {
    //     return $this->belongsToMany('App\Models\User','recievepr_id','id');
    // }
 

}
