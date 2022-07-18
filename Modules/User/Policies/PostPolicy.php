<?php

namespace Modules\User\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Cinema\Entities\Ajah;
use Modules\User\Entities\User;
use phpDocumentor\Reflection\Types\True_;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    protected function create(User $user)
    {
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->id == 1){
                    return true;
                }
            }
        }
        return false;
    }
}
