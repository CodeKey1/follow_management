<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vice_signatur extends Model
{
    use HasFactory;

    protected $table  = 'vice_signatur';

    protected $fillable = ['id','signature','created_at' , 'updated_at'];

}
