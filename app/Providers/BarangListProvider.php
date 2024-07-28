<?php

namespace App\Providers;

use App\Services\Impl\BarangListServiceImpl;
use App\Services\BarangListService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class BarangListProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        BarangListService::class => BarangListServiceImpl::class
    ];

    public function provides()
    {
        return [BarangListService::class];
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
