<?php

   namespace App\Http\Controllers\Api;

   use App\Application\Orders\Services\CreateOrderApplicationService;
   use App\Http\Controllers\Controller;
   use Illuminate\Http\JsonResponse;
   use Illuminate\Http\Request;

   class OrderController extends Controller
   {
       private CreateOrderApplicationService $createOrderService;

       public function __construct(CreateOrderApplicationService $createOrderService)
       {
           $this->createOrderService = $createOrderService;
       }

       public function store(Request $request): JsonResponse
       {
           $order = $this->createOrderService->execute($request->input('id'), $request->input('amount'));
           return response()->json([
               'id' => $order->getId(),
               'total_amount' => $order->getTotal()->getAmount(),
               'currency' => $order->getTotal()->getCurrency(),
               'status' => $order->getStatus(),
           ]);
       }
   }
