<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $with = ['followings','posts'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_id','name','email', 'password','image',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function views()
    {
        return $this->hasMany('App\Models\View','by');
    }

    public function followings()
    {
        return $this->hasMany('App\Models\Follower');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function unreadNotification() {
        return $this->notifications()->whereNull('read_at')->get();
    }

    public function latestNotification() {
        return $this->notifications()->latest();
    }

    public function scopeAuther($query)
    {
        return $query->where('role_id','2')->get();
    }

    

}
