<?php

   namespace App\Domain\Orders\Entities;

   use App\Domain\Orders\ValueObjects\Money;

   class Order
   {
       private int $id;
       private Money $total;
       private string $status;

       public function __construct(int $id, Money $total, string $status = 'pending')
       {
           $this->id = $id;
           $this->total = $total;
           $this->status = $status;
       }

       public function getId(): int
       {
           return $this->id;
       }

       public function getTotal(): Money
       {
           return $this->total;
       }

       public function getStatus(): string
       {
           return $this->status;
       }

       public function updateStatus(string $status): void
       {
           $this->status = $status;
       }
   }
