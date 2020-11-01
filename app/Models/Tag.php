<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function repositories()
    {
        return $this->hasMany('App\Models\Repository');
    }
}
