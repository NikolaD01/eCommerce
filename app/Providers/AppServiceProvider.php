<?php

namespace App\Providers;

use App\Interfaces\MediaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\BaseRepositoryInterface;

use App\Repositories\ProductRepository;
use App\Repositories\ColorRepository;
use App\Repositories\SizeRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\CategoryRepository;

use App\Services\Shop\ProductService;
use App\Services\Shop\ColorService;
use App\Services\Shop\SizeService;
use App\Services\Shop\MaterialService;
use App\Services\Shop\CategoryService;

use App\Repositories\MediaRepository;
use App\Services\Media\MediaService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MediaRepositoryInterface::class , MediaRepository::class);

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class, function ($app) {
            return new ProductRepository(new \App\Models\Product());
        });
        $this->app->bind(BaseRepositoryInterface::class . '.color', ColorRepository::class);
        $this->app->bind(BaseRepositoryInterface::class . '.size', SizeRepository::class);
        $this->app->bind(BaseRepositoryInterface::class . '.material', MaterialRepository::class);
        $this->app->bind(BaseRepositoryInterface::class . '.category', CategoryRepository::class);

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
