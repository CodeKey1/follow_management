<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_export extends Model
{
    use HasFactory;

    protected $table = 'r_export';
    protected $fillable = ['id','responsible_export_id','responsibles_id','reply_id','confirm_vic','date','reply_file','topic','cat_name'];
    protected $hidden = ['deleted_at','created_at', 'updated_at'];

    public function Reply_res(){
        return $this->belongsTo(Responsible::class ,'responsibles_id');
    }
    public function Reply_ex(){
        return $this->belongsTo(Responsible_export::class ,'responsible_export_id');
    }
}
