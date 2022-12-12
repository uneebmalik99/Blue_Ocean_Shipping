<?php

namespace App\Policies;

use App\Models\User;
use App\Models\role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
     /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $post
     * @return bool
     */

    public function super_admin(User $user){
        // dd($role);
        return $user->role_id == role::Super_Admin;
    } 
    public function sub_admin(User $user, role $role){
        return $user->role_id == role::Sub_Admin;
    } 
    public function location_admin(User $user, role $role){
        return $user->role_id == role::Location_Admin;
    } 
    public function customer(User $user, role $role){
        return $user->role_id == role::Customer;
    } 
    public function can_delete(User $user, role $role){
        return $user->role_id == role::Super_Admin;
    }

    public function can_update(User $user, role $role){
        return $user->role_id == role::Super_Admin;
    }

    public function can_view(User $user, role $role){
        return $user->role_id == role::Super_Admin;
    }
    public function suporsub(User $user, role $role){
        // dd($role);
        return in_array($user->role_id, [role::Super_Admin, role::Sub_Admin]);
    }
   
}
