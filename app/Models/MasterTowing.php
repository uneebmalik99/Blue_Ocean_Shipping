<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTowing extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "master_towings";
    protected $guarded = [];
}
