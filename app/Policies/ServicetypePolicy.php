<?php

namespace App\Policies;

use App\User;
use App\ServiceType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicetypePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any = service types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 32){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can view the = service type.
     *
     * @param  \App\User  $user
     * @param  \App\=ServiceType  $=ServiceType
     * @return mixed
     */
    public function view(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 28){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create = service types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 25){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the = service type.
     *
     * @param  \App\User  $user
     * @param  \App\=ServiceType  $=ServiceType
     * @return mixed
     */
    public function update(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 26){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the = service type.
     *
     * @param  \App\User  $user
     * @param  \App\=ServiceType  $=ServiceType
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 27){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the = service type.
     *
     * @param  \App\User  $user
     * @param  \App\=ServiceType  $=ServiceType
     * @return mixed
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the = service type.
     *
     * @param  \App\User  $user
     * @param  \App\=ServiceType  $=ServiceType
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
