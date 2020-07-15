<?php

namespace Larabookir\Gateway\Models;

use Illuminate\Database\Eloquent\Model;

class SadadGateway extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('gateway.sadad_gateway_table', 'sadad_gateway'));
    }

    public function user()
    {
        return $this->belongsTo('App\\'.config('gateway.user_table','users'));
    }
}
