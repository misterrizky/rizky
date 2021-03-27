<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id_project';
    
    protected $fillable = [
        'title','slug', 'fid_client', 'tags','uri','description','photo','is_active','is_done',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
