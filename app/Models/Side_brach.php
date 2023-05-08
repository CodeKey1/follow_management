<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Side_brach extends Model
{
    use HasFactory;

    protected $table = 'side_branch';
    protected $fillable = ['name','sides_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function  scopeSelection($query){
        return $query -> select('name','id');
    }
    public function sideBranch(){

        return  $this->belongsTo(Side::class ,'sides_id');
    }
}
