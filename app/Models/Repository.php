<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'user_id',
        'repository_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
