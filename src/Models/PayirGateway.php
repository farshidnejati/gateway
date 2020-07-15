<?php

namespace Larabookir\Gateway\Models;

use Illuminate\Database\Eloquent\Model;

class PayirGateway extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('gateway.payir_gateway_table', 'payir_gateway'));
    }

    public function user()
    {
        return $this->belongsTo('App\\'.config('gateway.user_table','users'));
    }
}
