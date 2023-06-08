<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governor_signatur extends Model
{
    use HasFactory;

    protected $table = 'governor_signature';
    protected $fillable = ['id','posta_num','posta_office_num','posta_date','bosta_recive','bosta__id','side_name','posta_side','posta_state','posta_about','posta_file'];
    protected $hidden = ['created_at', 'updated_at'];
}
