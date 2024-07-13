<?php

namespace App\Providers;


use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\User\UserDataService;
use App\Services\User\UserService;
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


        $this->app->bind(MediaRepositoryInterface::class , MediaRepository::class);
        $this->app->bind(UserDataRepositoryInterface::class, UserDataRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class, function ($app) {
            return new ProductRepository(new \App\Models\Product());
        });

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(
            BaseRepositoryInterface::class,
            function ($app) {
                return collect([
                    'color' => $app->make(ColorRepository::class),
                    'size' => $app->make(SizeRepository::class),
                    'material' => $app->make(MaterialRepository::class),
                    'category' => $app->make(CategoryRepository::class),
                ]);
            }
        );


        $services = collect([
            ColorService::class => 'color',
            SizeService::class => 'size',
            MaterialService::class => 'material',
            CategoryService::class => 'category',
        ]);

        $services->each(function ($repositoryKey, $service) {
            $this->app->singleton($service, function ($app) use ($repositoryKey, $service) {
                $repositories = $app->make(BaseRepositoryInterface::class);
                return new $service($repositories->get($repositoryKey));
            });
        });

        $this->app->singleton(CacheUtility::class, function ($app) {
            return new CacheUtility();
        });

        $this->app->singleton(UserDataService::class, function ($app) {
            return new UserDataService($app->make(UserDataRepositoryInterface::class));
        });


        $this->app->singleton(MediaService::class, function ($app) {
            return new MediaService($app->make(MediaRepositoryInterface::class));
        });

        $this->app->singleton(ProductService::class, function ($app) {
            return new ProductService($app->make(ProductRepositoryInterface::class));
        });

        $this->app->singleton(UserService::class, function ($app) {
            return new UserService($app->make(UserRepositoryInterface::class));
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
