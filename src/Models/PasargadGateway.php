<?php

namespace Larabookir\Gateway\Models;

use Illuminate\Database\Eloquent\Model;

class PasargadGateway extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('gateway.pasargad_gateway_table', 'pasargad_gateway'));
    }

    public function user()
    {
        return $this->belongsTo('App\\'.config('gateway.user_table','users'));
    }
}
