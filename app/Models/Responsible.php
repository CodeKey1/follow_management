<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{

    //
    protected $table = 'responsibles';
    protected $fillable = ['id','name'];
    protected $hidden = ['created_at', 'updated_at'];

    public function  scopeSelection($query){
        return $query -> select('id','name');
    }

    public function Responetopic(){
        return $this->belongsToMany(Topic::class);
    }
    public function Responexport(){
        return $this->belongsToMany(Export::class);
    }


}
