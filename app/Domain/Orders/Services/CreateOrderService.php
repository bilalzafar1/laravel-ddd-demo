<?php

   namespace App\Domain\Orders\Services;

   use App\Domain\Orders\Entities\Order;
   use App\Domain\Orders\Repositories\OrderRepositoryInterface;
   use App\Domain\Orders\ValueObjects\Money;

   class CreateOrderService
   {
       private OrderRepositoryInterface $orderRepository;

       public function __construct(OrderRepositoryInterface $orderRepository)
       {
           $this->orderRepository = $orderRepository;
       }

       public function createOrder(int $id, float $amount): Order
       {
           $money = new Money($amount);
           $order = new Order($id, $money);
           $this->orderRepository->save($order);
           return $order;
       }
   }
