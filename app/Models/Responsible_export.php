<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsible_export extends Model
{
    use HasFactory;

    protected $table = 'responsible_export';

    protected $fillable = ['id', 'tittle', 'topic_id', 'export_number', 'responsible_id', 'date', 'file', 'state', 'note', 'cat_name', 'deleted_at', 'created_at', 'updated_at'];

    public function scopeSelection($query)
    {
        return $query->select('id', 'tittle', 'topic_id', 'export_number', 'responsible_id', 'date', 'file', 'state', 'note', 'notes');
    }

    protected $casts = ['date' => 'datetime'];

    public function inside_topic_export()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
    public function ins_resname()
    {
        return $this->belongsTo(Responsible::class, 'responsible_id');
    }
}
