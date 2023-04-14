<?php

namespace App\Providers;

use App\Implementation\AccountImplementation;
use App\Implementation\PaymentImplementation;
use App\Implementation\UserImplementation;
use App\Interface\AccountInterface;
use App\Interface\PaymentInterface;
use App\Interface\UserInterface;
use Illuminate\Support\ServiceProvider;


class InterfaceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }
    public function register()
    {
        $this->app->bind(
            AccountInterface::class,
            AccountImplementation::class
        );
        $this->app->bind(
            UserInterface::class,
            UserImplementation::class
        );
        $this->app->bind(
            PaymentInterface::class,
            PaymentImplementation::class
        );
    }

}
