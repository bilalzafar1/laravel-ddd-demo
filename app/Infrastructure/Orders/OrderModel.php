<?php

   namespace App\Infrastructure\Orders;

   use Illuminate\Database\Eloquent\Model;

   class OrderModel extends Model
   {
       protected $table = 'orders';
       protected $fillable = ['id', 'total_amount', 'currency', 'status'];
   }
