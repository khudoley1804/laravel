<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class History extends Authenticatable
{
    use Notifiable;

    protected $tableName = 'history';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'ip',
        'state',
        'logged_at',
        'logged_out_at'
    ];

    public function getTable()
    {
        return $this->tableName;
    }
}
