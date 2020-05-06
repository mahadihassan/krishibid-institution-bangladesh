<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    public function User()
    {
    	return $this->belongsTo('App\User', 'users_id');
    }
    

    public function Service()
    {
    	return $this->belongsTo('App\Service', 'service_bookings_id');
    }

}
