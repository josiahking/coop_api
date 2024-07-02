<?php

namespace App\Providers;

use App\Interfaces\Auth\DriverAuthRepositoryInterface;
use App\Interfaces\Auth\RiderAuthRepositoryInterface;
use App\Interfaces\DriverOnboardingRepositoryInterface;
use App\Interfaces\DriversRepositoryInterface;
use App\Interfaces\OtpRepositoryInterface;
use App\Interfaces\RidersRepositoryInterface;
use App\Repositories\Auth\DriverAuthRepository;
use App\Repositories\Auth\RiderAuthRepository;
use App\Repositories\DriverOnboardingRepository;
use App\Repositories\DriversRepository;
use App\Repositories\OtpRepository;
use App\Repositories\RidersRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DriverAuthRepositoryInterface::class, DriverAuthRepository::class);
        $this->app->bind(RiderAuthRepositoryInterface::class, RiderAuthRepository::class);
        $this->app->bind(OtpRepositoryInterface::class, OtpRepository::class);
        $this->app->bind(DriversRepositoryInterface::class, DriversRepository::class);
        $this->app->bind(RidersRepositoryInterface::class, RidersRepository::class);
        $this->app->bind(DriverOnboardingRepositoryInterface::class, DriverOnboardingRepository::class);
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
