<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('update', function (User $user, Task $task) {
            return $user->id === $task->user_id;
        });
        Gate::define('store', function (User $user, Task $task) {
            return $user->id === $task->user_id;
        });
    }
}
