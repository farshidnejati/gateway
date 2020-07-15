<?php

namespace Larabookir\Gateway\Models;

use Illuminate\Database\Eloquent\Model;

class SamanGateway extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('gateway.saman_gateway_table', 'saman_gateway'));
    }

    public function user()
    {
        return $this->belongsTo('App\\'.config('gateway.user_table','users'));
    }
}
