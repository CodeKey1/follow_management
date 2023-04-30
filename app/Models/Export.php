<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Export extends Model
{
    use SoftDeletes;
    protected $table  = 'exports';

    protected $fillable = ['name','send_to', 'send_date', 'requested_date' ,'state' ,'details','upload_f','cat_name', 'deleted_at', 'created_at' , 'updated_at'];

    public function  scopeSelection($query){

        return $query -> select('id','name','send_to','send_date','requested_date','upload_f','details');
    }

}
