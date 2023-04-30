<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Side extends Model
{
    use HasFactory;

    protected $table  = 'sides';

    protected $fillable = ['id','side_name','created_at','updated_at'];
}
