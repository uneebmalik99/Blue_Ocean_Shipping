<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class AuthAssignment extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'auth_assignments';
    protected $primaryKey = ['iten_name', 'user_id'];
    public $timestamps = true;
    protected $fillable = [
        'iten_name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
