<?php

namespace App\Policies;

use App\User;
use App\Event;
use App\PermissionRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any events.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 30){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can view the event.
     *
     * @param  \App\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function view(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 5){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 2){
                    return true;
                }
            }
        }
        return false;

    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  \App\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function update(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 3){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param  \App\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 4){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the event.
     *
     * @param  \App\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function restore(User $user, Event $event)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the event.
     *
     * @param  \App\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function forceDelete(User $user, Event $event)
    {
        //
    }
}
