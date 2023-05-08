<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Side extends Model
{
    use HasFactory;

    protected $table  = 'sides';

    protected $fillable = ['id','side_name','created_at','updated_at'];

    public function side_topic(){
        return $this->hasMany(Topic::class,'side_id');
    }
    public function branch(){
        return $this->hasMany(Side_brach::class,'sides_id');
    }
    public function side_export(){
        return $this->hasMany(Export::class ,'side_id');
    }
}
