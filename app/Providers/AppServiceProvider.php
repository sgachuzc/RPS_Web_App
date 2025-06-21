<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    
    public function register(): void {
        //
    }

    public function boot(): void {
        Gate::define('admin', function(User $user){
            return $user->role->name === Role::ADMIN_ROLE;
        });
    }
}
