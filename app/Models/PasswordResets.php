<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    protected $table = 'password_resets';
    protected $fillable = [
        'email', 'token'
    ];
    public $timestamps = false;
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
    public function user()
    {
        return $this->belongsTo('App\Models\Employee', 'email');
    }
}
