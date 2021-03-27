<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id_client';

    protected $fillable = [
        'name', 'photo', 'is_active'
    ];
    public function getTakeImageAttribute()
    {
        return "storage/" . $this->photo;
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
