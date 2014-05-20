<?php

class OrderController
extends BaseController
{
    public function indexAction()
    {
        $query = Order::with([
            "account",
            "orderItems",
            "orderItems.product",
            "orderItems.product.category"
        ]);
        
        $account = Input::get("account");
        
        if ($account)
        {
            $query->where("account_id", $account);
        }
        
        return $query->get();
    }
    
    public function addAction()
    {
        $validator = Validator::make(Input::all(), [
            "account" => "required|exists:account,id",
            "items" => "required"
        ]);
        
        if ($validator->passes())
        {
            $order = Order::create([
                "account_id" => Input::get("account")
            ]);
            
            try
            {
                $items = json_decode(Input::get("items"));
            } 
            catch (Exception $e) 
            {
                return Response::json([
                    "status" => "error",
                    "errors" => [
                        "items" => [
                            "Invalid items format."
                        ]
                    ]
                ]);
            }
            
            $total = 0;
            
            foreach ($items as $item)
            {
                $orderItem = OrderItem::create([
                    "order_id" => $order->id,
                    "product_id" => $item->product_id,
                    "quantity" => $item->quantity
                ]);
                
                $product = $orderItem->product;
                
                $orderItem->price = $product->price;
                $orderItem->save();
                
                $product->stock -= $item->quantity;
                $product->save();
                
                $total += $orderItem->quantity * $orderItem->price;
            }
            
            $result = $this->gateway->pay(
                Input::get("number"),
                Input::get("expiry"),
                $total,
                "eur"
             );
            
            if (!$result)
            {
               return Response::json([
                   "status" => "error",
                   "errors" => [
                       "gateway" => [
                           "Payment error"
                       ]
                   ]
               ]); 
            }
            
            $account = $order->account;
            
            $document = $this->document->create($order);
            $this->messenger->send($order, $document);
            
            return Response::json([
                "status" => "error",
                "errors" => $validator->errors()->toArray()
            ]);
        }
    }
    
}

