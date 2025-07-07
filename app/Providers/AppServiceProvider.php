<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    
    public function register(): void {
        //
    }

    public function boot(): void {
        Gate::define('admin', function(User $user){
            $user->loadMissing('role');
            return $user->role->name === Role::ADMIN_ROLE;
        });

        Paginator::useBootstrapFive();

        Model::preventLazyLoading();
    }
}
