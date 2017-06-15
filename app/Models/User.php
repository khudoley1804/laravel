<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $tableName = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     
    /**Связываем таблицу Users c таблицей News (один ко многим)
     * Get the comments for the blog post.
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }
    
    /**Связываем таблицу Users c таблицей Roles(многие ко многим)
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getTable()
    {
        return $this->tableName;
    }

    public function getCacheKey () {
        if (! $this->exists) {
            throw new ModelNotFoundException();
        }
        return $this->getTable().'#'.$this->id;
    }
}
