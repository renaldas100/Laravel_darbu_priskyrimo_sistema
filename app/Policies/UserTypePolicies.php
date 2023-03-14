<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserTypePolicies
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewTasksByUserType(User $user){
        return $user=Auth::user()->admin==1;
//        return true;

    }

}
