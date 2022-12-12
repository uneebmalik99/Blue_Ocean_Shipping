<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table = "messages";
    protected $guarded = [];
    // public function chats()
    // {
    //     return $this->hasMany('App\Models\Chat' );
    // }
    
}
