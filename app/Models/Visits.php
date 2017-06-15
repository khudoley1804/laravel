<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Visits extends Authenticatable
{
    use Notifiable;

    protected $tableName = 'visits';

        public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'count_visits', 'dateTime',
    ];

    public function getTable()
    {
        return $this->tableName;
    }
}
