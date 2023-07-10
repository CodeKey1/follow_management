<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vice_noteTopic extends Model
{
    use HasFactory;

    protected $table  = 'vice_noteTopic';

    protected $fillable = ['id','topic_id','vice_note','date','created_at' , 'updated_at'];

}
