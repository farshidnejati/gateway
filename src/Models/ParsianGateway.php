<?php

namespace Larabookir\Gateway\Models;

use Illuminate\Database\Eloquent\Model;

class ParsianGateway extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('gateway.parsian_gateway_table', 'parsian_gateway'));
    }

    public function user()
    {
        return $this->belongsTo('App\\'.config('gateway.user_table','users'));
    }
}
