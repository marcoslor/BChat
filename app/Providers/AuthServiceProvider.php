<?php

namespace App\Providers;

use App\Chat;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('participate-in-chat', function (User $user, Chat $chat) {
            return $chat->users->contains($chat);
        });

        //Gate::define('update-post', 'App\Policies\PostPolicy@update');
        //
    }
}
