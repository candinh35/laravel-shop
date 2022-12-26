<?php

namespace App\Providers;

use App\Models\Menu;
use App\repositories\background\BackgroundRepository;
use App\repositories\background\BackgroundRepositoryInterface;
use App\repositories\banner\BannerRepository;
use App\repositories\banner\BannerRepositoryInterface;
use App\repositories\brand\BrandRepository;
use App\repositories\brand\BrandRepositoryInterface;
use App\repositories\category\CategoryRepository;
use App\repositories\category\CategoryRepositoryInterface;
use App\repositories\blog\BlogRepository;
use App\repositories\blog\BlogRepositoryInterface;
use App\repositories\customer\CustomerRepository;
use App\repositories\customer\CustomerRepositoryInterface;
use App\repositories\menu\MenuRepository;
use App\repositories\menu\MenuRepositoryInterface;
use App\repositories\order\OrderRepository;
use App\repositories\order\OrderRepositoryInterface;
use App\repositories\product\ProductRepository;
use App\repositories\product\ProductRepositoryInterface;
use App\repositories\role\RoleRepository;
use App\repositories\role\RoleRepositoryInterface;
use App\repositories\user\UserRepository;
use App\repositories\user\UserRepositoryInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            MenuRepositoryInterface::class,
            MenuRepository::class,
        );
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class,
        );
        $this->app->singleton(
            BrandRepositoryInterface::class,
            BrandRepository::class,
        );
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->singleton(
            BannerRepositoryInterface::class,
            BannerRepository::class,
        );
        $this->app->singleton(
            RoleRepositoryInterface::class,
            RoleRepository::class,
        );
        $this->app->singleton(
            BackgroundRepositoryInterface::class,
            BackgroundRepository::class,
        );
        $this->app->singleton(
            BlogRepositoryInterface::class,
            BlogRepository::class,
        );
        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class,
        );
        $this->app->singleton(
            CustomerRepositoryInterface::class,
            CustomerRepository::class,
        );

    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        $menus = Menu::where('status' , 1)->get();
        view()->share(compact('menus', ));
    }
}
