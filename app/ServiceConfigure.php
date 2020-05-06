<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceConfigure extends Model
{
	protected $fillable = [
        'service_types_id', 'services_id', 'check_in', 'check_out', 'duration',
    ];
    protected $table = 'service_configures';

 	protected $primaryKey = 'id';

    public function service()
    {
    	return $this->belongsTo('App\Service', 'services_id');
    }

    public function serviceType()
    {
    	return $this->belongsTo('App\ServiceType', 'service_types_id');
    }
    protected $timeFormat = 'h:i: A';
}
