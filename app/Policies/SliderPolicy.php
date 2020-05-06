<?php

namespace App\Policies;

use App\User;
use App\Slider;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any sliders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 35){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can view the slider.
     *
     * @param  \App\User  $user
     * @param  \App\Slider  $slider
     * @return mixed
     */
    public function view(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 21){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create sliders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 18){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the slider.
     *
     * @param  \App\User  $user
     * @param  \App\Slider  $slider
     * @return mixed
     */
    public function update(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 19){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the slider.
     *
     * @param  \App\User  $user
     * @param  \App\Slider  $slider
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach ($user->roles as  $value) {
            foreach ($value->permissions as $permission) {
                if($permission->id == 20){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the slider.
     *
     * @param  \App\User  $user
     * @param  \App\Slider  $slider
     * @return mixed
     */
    public function restore(User $user, Slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the slider.
     *
     * @param  \App\User  $user
     * @param  \App\Slider  $slider
     * @return mixed
     */
    public function forceDelete(User $user, Slider $slider)
    {
        //
    }
}
