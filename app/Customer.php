<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are not mass-fillable
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the account associated with the Customer
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function account()
    {
        return $this->hasOne('App\Account');
    }

    /**
     * Get the locations associated with the Customer
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany('App\Location');
    }
}
