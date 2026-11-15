<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Order;

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
    {    //untuk customers
        Paginator::useBootstrapFive();
        Gate::define('view.customers', function($user){
            return in_array($user->role, ['admin', 'staff', 'manager']);
        });
    
        Gate::define('manage.customers', function($user){
            return in_array($user->role, ['admin', 'staff']);
        });

         Gate::define('delete.customers', function($user){
            return in_array($user->role, ['admin', ]);
        });
        //akhir untuk customers

        //untuk orders
         Paginator::useBootstrapFive();
        Gate::define('view.orders', function($user){
            return in_array($user->role, ['admin', 'staff', 'manager']);
        });
        
        Gate::define('manager.orders', function($user){
            return in_array($user->role, ['admin', 'staff']);
        });

         Gate::define('delete.orders', function($user){
            return in_array($user->role, ['admin', ]);
        });

        Gate::define('approve.orders', function($user, Order $order){
            return $user->role === 'manager' && $order->total >= 1000000 && $order->status === 'pending';
        });

        //akhir untuk order
        
    }
}
