<?php

namespace Larabookir\Gateway\Models;

use Illuminate\Database\Eloquent\Model;

class IrankishGateway extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('gateway.irankish_gateway_table', 'irankish_gateway'));
    }

    public function user()
    {
        return $this->belongsTo('App\\'.config('gateway.user_table','users'));
    }
}
