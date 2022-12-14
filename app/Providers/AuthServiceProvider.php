<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /**
         *   Mặc định ở đây sẽ nhận vào $user hiện tại
         *
         *  $route đưuọc truyền từ bên middlewware qua và kiểm tra ở model user
         */
        app(Gate::class)->before(function ($user, $route) {
            if (method_exists($user, 'checkPermissionAccess')) {
                return $user->checkPermissionAccess($route);
            }
            return false;
        });
    }
}
