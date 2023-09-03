<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Publication;

use App\Policies\PublicationPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
       Publication::class => PublicationPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate::define('allow-update',function(GenericUser $profile , Publication $publication){
        //     return $profile->id === $publication->profile_id;
        // });
    }
}
