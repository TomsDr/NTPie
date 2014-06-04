<?php

class OrderController
extends BaseController
{
   
//Atgriež pasūtījumu    
    
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

//Pievieno produktus pasūtījumam    
    
    public function addAction()
    {
        
//Pārbauda kontu un pasūtījumā esošos priekšmetus        
        
        $validator = Validator::make(Input::all(), [
            "account" => "required|exists:account,id",
            "items" => "required"
        ]);

//Izveido jaunu pasūtījumu        
        
        if ($validator->passes())
        {
            $order = Order::create([
                "account_id" => Input::get("account")
            ]);

//Pārbauda produkta formātu            
            
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

//Kopsumma            
            
            $total = 0;

//Iegūst katra produkta, kas ir grozā, info            
            
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
 
//Iegūst kopsummu                
                
                $total += $orderItem->quantity * $orderItem->price;
            }
            
            $result = $this->gateway->pay(
                Input::get("number"),
                Input::get("expiry"),
                $total,
                "eur"
             );
    
//            
            
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

//Piesaista lietotāja kontu pasūtījumam            
            
            $account = $order->account;

//gatavo pfd dokumentu            
            
            $document = $this->document->create($order);
            $this->messenger->send($order, $document);
            
            return Response::json([
                "status" => "error",
                "errors" => $validator->errors()->toArray()
            ]);
        }
    }
    
}

