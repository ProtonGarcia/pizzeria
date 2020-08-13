<?php

namespace App;
use App\Order;
use App\Scopes\ClientScope;

class Client extends User
{

    protected static function boot()
    {
       parent::boot();

       static::addGlobalScope(new ClientScope);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
