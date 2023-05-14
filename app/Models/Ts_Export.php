<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ts_Export extends Model
{
    use HasFactory;

    protected $table = 'export_responsible';
    protected $fillable = ['id','responsible_id','export_id','state'];
    protected $hidden = ['deleted_at','created_at', 'updated_at'];


    // public function R_export(){
    //     return $this->hasMany(Topic::class ,'topic_id');
    // }
    public function Res_export(){
        return $this->belongsTo(Responsible::class ,'responsibles_id');
    }
    // public function S_export(){
    //     return $this->belongsTo(Side::class ,'side_id');
    // }
    public function R_export(){
        return $this->belongsTo(Export::class ,'export_id');
    }
}
