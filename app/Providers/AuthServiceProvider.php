<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Task;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Policies\UserTypePolicies;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
//         'App\Models\User' => 'App\Policies\UserPolicy',
        User::class=>UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('deleteUser',function (User $user){
            if($user->can_delete_user==1){
                return true;
            }else{
                return false;
            }
        });


        Gate::define('changePasswordUser',function (User $user){
            if($user->can_change_password==1){
                return true;
            }else{
                return false;
            }
        });

        Gate::define('viewTasksByUserType',[UserTypePolicies::class,'viewTasksByUserType']);

    }
}
