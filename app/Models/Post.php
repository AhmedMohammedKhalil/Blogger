<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //protected $with = ['user','reactions','comments','media','views'];

    protected $fillable = [
        'user_id','content','type'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function reactions()
    {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function media() 
    {
        return $this->hasMany('App\Models\Media');
    }

    public function views() 
    {
        return $this->hasMany('App\Models\View');
    }
}
