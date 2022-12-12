<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerSize extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "container_sizes";
    protected $guarded = [];
}
