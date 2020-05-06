<?php

namespace App\Policies;

use App\User;
use App\ServiceConfigure;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceconfigurePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any service configures.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 33){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can view the service configure.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceConfigure  $serviceConfigure
     * @return mixed
     */
    public function view(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 17){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create service configures.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 14){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the service configure.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceConfigure  $serviceConfigure
     * @return mixed
     */
    public function update(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 15){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the service configure.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceConfigure  $serviceConfigure
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 16){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the service configure.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceConfigure  $serviceConfigure
     * @return mixed
     */
    public function restore(User $user, ServiceConfigure $serviceConfigure)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the service configure.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceConfigure  $serviceConfigure
     * @return mixed
     */
    public function forceDelete(User $user, ServiceConfigure $serviceConfigure)
    {
        //
    }
}
