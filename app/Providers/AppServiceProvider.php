<?php

   namespace App\Providers;

   use App\Application\Orders\Services\CreateOrderApplicationService;
   use App\Domain\Orders\Repositories\OrderRepositoryInterface;
   use App\Domain\Orders\Services\CreateOrderService;
   use App\Infrastructure\Orders\Repositories\EloquentOrderRepository;
   use Illuminate\Support\ServiceProvider;

   class AppServiceProvider extends ServiceProvider
   {
       public function register(): void
       {
           $this->app->bind(OrderRepositoryInterface::class, EloquentOrderRepository::class);
           $this->app->bind(CreateOrderService::class, function ($app) {
               return new CreateOrderService($app->make(OrderRepositoryInterface::class));
           });
           $this->app->bind(CreateOrderApplicationService::class, function ($app) {
               return new CreateOrderApplicationService($app->make(CreateOrderService::class));
           });
       }

       public function boot(): void
       {
           //
       }
   }
