<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;
    //
    protected $table  = 'topics';

    protected $fillable = ['import_id','name','responsibles_id','side_id' ,'vic_sign','recived_date','state','users_name','notes','file','cat_name', 'deleted_at', 'created_at' , 'updated_at'];

    public function  scopeSelection($query){

        return $query -> select('id','import_id','name','responsibles_id', 'side_id', 'vic_sign','recived_date','state','users_name','notes','file','cat_name');
    }
}
