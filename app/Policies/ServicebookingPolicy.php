<?php

namespace App\Policies;

use App\User;
use App\ServiceBooking;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicebookingPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any service bookings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 34){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can view the service booking.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceBooking  $serviceBooking
     * @return mixed
     */
    public function view(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 24){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create service bookings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
    
    }

    /**
     * Determine whether the user can update the service booking.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceBooking  $serviceBooking
     * @return mixed
     */
    public function update(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 22){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the service booking.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceBooking  $serviceBooking
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 23){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the service booking.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceBooking  $serviceBooking
     * @return mixed
     */
    public function restore(User $user, ServiceBooking $serviceBooking)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the service booking.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceBooking  $serviceBooking
     * @return mixed
     */
    public function forceDelete(User $user, ServiceBooking $serviceBooking)
    {
        //
    }
}
