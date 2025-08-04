<?php

   namespace App\Domain\Orders\ValueObjects;

   class Money
   {
       private float $amount;
       private string $currency;

       public function __construct(float $amount, string $currency = 'USD')
       {
           if ($amount < 0) {
               throw new \InvalidArgumentException('Amount cannot be negative');
           }
           $this->amount = $amount;
           $this->currency = $currency;
       }

       public function getAmount(): float
       {
           return $this->amount;
       }

       public function getCurrency(): string
       {
           return $this->currency;
       }
   }
