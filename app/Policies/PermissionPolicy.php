<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any permissions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 47){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function view(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 46){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 43){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function update(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 44){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 45){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function restore(User $user, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
