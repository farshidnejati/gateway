<?php

namespace Larabookir\Gateway\Models;

use Illuminate\Database\Eloquent\Model;

class ZarinpalGateway extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('gateway.zarinpal_gateway_table', 'zarinpal_gateway'));
        
    }

    public function user()
    {
        return $this->belongsTo('App\\'.config('gateway.user_table','users'));
    }
}
