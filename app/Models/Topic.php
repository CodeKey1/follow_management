<?php

namespace App\Models;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;
    //
    protected $table  = 'topics';

    protected $fillable = ['import_id','office_id','name','vic_sign','import_date','recived_date','state','users_name','notes','file','cat_name','side_id', 'deleted_at', 'created_at' , 'updated_at'];

    public function  scopeSelection($query){

        return $query -> select('id','import_id','office_id','name','vic_sign','import_date','recived_date','state','users_name','notes','file','cat_name','side_id');
    }

    protected $casts = [ 'recived_date'=>'datetime'];

    public function name_side(){

        return  $this->belongsTo(Side::class ,'side_id');
    }

    public function rsename(){

        return  $this->belongsToMany(Responsible::class);
    }
    public function export_topic(){

        return  $this->hasMany(Ts_Export::class ,'topic_id');
    }
    public function t_export(){

        return  $this->hasMany(Export::class ,'topic_id');
    }
}
