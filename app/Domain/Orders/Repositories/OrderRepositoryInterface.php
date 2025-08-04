<?php

   namespace App\Domain\Orders\Repositories;

   use App\Domain\Orders\Entities\Order;

   interface OrderRepositoryInterface
   {
       public function save(Order $order): void;
       public function find(int $id): ?Order;
   }
