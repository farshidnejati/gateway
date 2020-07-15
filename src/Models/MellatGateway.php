<?php

namespace Larabookir\Gateway\Models;

use Illuminate\Database\Eloquent\Model;

class MellatGateway extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('gateway.mellat_gateway_table', 'mellat_gateway'));
    }

    public function user()
    {
        return $this->belongsTo('App\\'.config('gateway.user_table','users'));
    }
}
