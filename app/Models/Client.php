<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guard = 'employee';
    protected $table = 'clients';
    protected $primaryKey = 'id_client';

    protected $fillable = [
        'name','slug', 'photo', 'is_active'
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
