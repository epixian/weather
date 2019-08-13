<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
