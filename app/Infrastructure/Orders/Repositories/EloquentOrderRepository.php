<?php

   namespace App\Infrastructure\Orders\Repositories;

   use App\Domain\Orders\Entities\Order;
   use App\Domain\Orders\Repositories\OrderRepositoryInterface;
   use App\Domain\Orders\ValueObjects\Money;
   use App\Infrastructure\Orders\OrderModel;

   class EloquentOrderRepository implements OrderRepositoryInterface
   {
       public function save(Order $order): void
       {
           OrderModel::updateOrCreate(
               ['id' => $order->getId()],
               [
                   'total_amount' => $order->getTotal()->getAmount(),
                   'currency' => $order->getTotal()->getCurrency(),
                   'status' => $order->getStatus(),
               ]
           );
       }

       public function find(int $id): ?Order
       {
           $orderModel = OrderModel::find($id);
           if (!$orderModel) {
               return null;
           }

           $money = new Money($orderModel->total_amount, $orderModel->currency);
           return new Order($orderModel->id, $money, $orderModel->status);
       }
   }
