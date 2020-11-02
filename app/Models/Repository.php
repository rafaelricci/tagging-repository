<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $primaryKey = ['first_id', 'second_id'];

    public $incrementing = false;

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

    public function getTagsRegistered($user_id, $repository_id)
    {
        $repositories = $this->where('user_id', $user_id)
                             ->where('repository_id', $repository_id)
                             ->get();
        $tags = [];
        foreach($repositories as $repository) 
        {
            array_push($tags, $repository->tag()
                                        ->where('user_id', $user_id)
                                        ->where('id', $repository->tag_id)
                                        ->first()
            );
        }

        return $tags;
    }
}
