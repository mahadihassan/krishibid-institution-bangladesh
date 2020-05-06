<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function serviceType()
    {
    	return $this->belongsTo('App\ServiceType', 'service_types_id');
    }
}
