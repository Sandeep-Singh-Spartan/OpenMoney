<?php

namespace App\Providers;

use App\Service\AccountThirdPartyService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('AccountThirdPartyService', function () {
            return new AccountThirdPartyService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
//        Passport::personalAccessClientId(config('passport.personal_access_client.id'));
//        Passport::personalAccessClientSecret(config('passport.personal_access_client.secret'));
    }
}
