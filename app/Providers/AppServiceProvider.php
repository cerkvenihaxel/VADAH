<?php

namespace App\Providers;

use App\Domain\ObraSocial\Repositories\ObraSocialRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\EloquentObraSocialRepository;
use App\Domain\UserInfo\Repositories\UserInfoRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\EloquentUserInfoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ObraSocialRepositoryInterface::class,
            EloquentObraSocialRepository::class,
        );

        $this->app->bind(
            UserInfoRepositoryInterface::class,
            EloquentUserInfoRepository::class
        );


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
