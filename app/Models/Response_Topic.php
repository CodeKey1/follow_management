<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Response_Topic extends Model
{
    use HasFactory;

    protected $table = 'responsible_topic';
    protected $fillable = ['id','tittle','export_number','date','file','responsible_id','topic_id','state'];
    protected $hidden = ['deleted_at','created_at', 'updated_at'];



    public function inside_export()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
    public function ins_resname()
    {
        return $this->belongsTo(Responsible::class, 'responsible_id');
    }

    public function R_topic(){
        return $this->belongsTo(Topic::class ,'topic_id');
    }
    public function Res_topic(){
        return $this->belongsTo(Responsible::class ,'responsible_id');
    }
    public function S_topic(){
        return $this->belongsTo(Side::class ,'side_id');
    }

    protected $casts = ['date' => 'datetime'];
}
