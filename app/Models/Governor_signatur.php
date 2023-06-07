<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governor_signatur extends Model
{
    use HasFactory;

    protected $table = 'governor_signature';
    protected $fillable = ['id','posta_date','posta_side','posta_state','posta_about','posta_file'];
    protected $hidden = ['created_at', 'updated_at'];
}
