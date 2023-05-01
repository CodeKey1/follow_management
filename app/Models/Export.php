<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Export extends Model
{
    use SoftDeletes;
    protected $table  = 'exports';

    protected $fillable = ['name','side_id', 'send_date', 'requested_date' ,'state' ,'details','upload_f','topic_id','cat_name', 'deleted_at', 'created_at' , 'updated_at'];

    public function  scopeSelection($query){

        return $query -> select('id','name','side_id','send_date','requested_date','upload_f','details','topic_id');
    }
    public function sidename_export(){

        return  $this->belongsTo(Side::class ,'side_id');
    }

}
