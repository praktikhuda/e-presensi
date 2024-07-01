<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        // Paginator::useBootstrapFour();

        Gate::define('admin', function ($user) {
            return $user instanceof \App\Models\Admin;
        });

        Gate::define('dosen', function ($user) {
            return $user instanceof \App\Models\Dosen;
        });

        Gate::define('mahasiswa', function ($user) {
            return $user instanceof \App\Models\Mahasiswa;
        });
    }
}
