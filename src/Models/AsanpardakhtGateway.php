<?php

namespace Larabookir\Gateway\Models;

use Illuminate\Database\Eloquent\Model;

class AsanpardakhtGateway extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('gateway.asanpardakht_gateway_table', 'asanpardakht_gateway'));
    }
    
    public function user()
    {
        return $this->belongsTo('App\\'.config('gateway.user_table','users'));
    }
}
