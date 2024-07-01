<?php

namespace App\Providers;


use App\Services\User\UserDataService;
use Illuminate\Support\ServiceProvider;

use App\Interfaces\BaseRepositoryInterface;

//User Data
use App\Interfaces\UserDataRepositoryInterface;
use App\Repositories\UserDataRepository;

//Product
use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Services\Shop\ProductService;

//Color
use App\Repositories\ColorRepository;
use App\Services\Shop\ColorService;

//Size
use App\Repositories\SizeRepository;
use App\Services\Shop\SizeService;

//Material
use App\Repositories\MaterialRepository;
use App\Services\Shop\MaterialService;

//Category
use App\Repositories\CategoryRepository;
use App\Services\Shop\CategoryService;


//Media
use App\Interfaces\MediaRepositoryInterface;
use App\Repositories\MediaRepository;
use App\Services\Media\MediaService;


//Cache
use App\Services\Utility\CacheUtility;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CacheUtility::class, function ($app) {
            return new CacheUtility();
        });

        $this->app->bind(MediaRepositoryInterface::class , MediaRepository::class);
        $this->app->bind(UserDataRepositoryInterface::class, UserDataRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class, function ($app) {
            return new ProductRepository(new \App\Models\Product());
        });
        $this->app->bind(BaseRepositoryInterface::class . '.color', ColorRepository::class);
        $this->app->bind(BaseRepositoryInterface::class . '.size', SizeRepository::class);
        $this->app->bind(BaseRepositoryInterface::class . '.material', MaterialRepository::class);
        $this->app->bind(BaseRepositoryInterface::class . '.category', CategoryRepository::class);

        $this->app->singleton(UserDataService::class, function ($app) {
            return new UserDataService($app->make(UserDataRepositoryInterface::class));
        });

        $this->app->singleton(MediaService::class, function ($app) {
            return new MediaService($app->make(MediaRepositoryInterface::class));
        });

        $this->app->singleton(ProductService::class, function ($app) {
            return new ProductService($app->make(ProductRepositoryInterface::class));
        });
        $this->app->singleton(ColorService::class, function ($app) {
            return new ColorService($app->make(BaseRepositoryInterface::class . '.color'));
        });

        $this->app->singleton(SizeService::class, function ($app) {
            return new SizeService($app->make(BaseRepositoryInterface::class . '.size'));
        });

        $this->app->singleton(MaterialService::class, function ($app) {
            return new MaterialService($app->make(BaseRepositoryInterface::class . '.material'));
        });

        $this->app->singleton(CategoryService::class, function ($app) {
            return new CategoryService($app->make(BaseRepositoryInterface::class . '.category'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
