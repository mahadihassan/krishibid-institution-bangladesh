<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model
{
    protected $fillable = [
        'users_id', 'services_id', 'service_configures_id', 'events_id', 'kib_number','service_cost','guest_number', 'notes'
    ];
    protected $table = 'service_bookings';

 	protected $primaryKey = 'id';

    public function service()
    {
    	return $this->belongsTo('App\Service', 'services_id');
    }

    public function Event()
    {
    	return $this->belongsTo('App\Event', 'events_id');
    }

    public function ServiceType()
    {
    	return $this->belongsTo('App\ServiceType', 'service_types_id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User', 'users_id');
    }

    public function ServiceConfigure()
    {
    	return $this->belongsTo('App\ServiceConfigure', 'service_configures_id');
    }
}
