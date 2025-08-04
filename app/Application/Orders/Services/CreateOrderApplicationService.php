<?php

   namespace App\Application\Orders\Services;

   use App\Domain\Orders\Entities\Order;
   use App\Domain\Orders\Services\CreateOrderService;

   class CreateOrderApplicationService
   {
       private CreateOrderService $createOrderService;

       public function __construct(CreateOrderService $createOrderService)
       {
           $this->createOrderService = $createOrderService;
       }

       public function execute(int $id, float $amount): Order
       {
           return $this->createOrderService->createOrder($id, $amount);
       }
   }
