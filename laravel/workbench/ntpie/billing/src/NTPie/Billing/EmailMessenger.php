<?php

namespace NTPie\Billing;

use Mail;

class EmailMessenger
implements MessengerInterface
{
    public function send(
        $order,
        $document
       ) {
        Mail::send("email/wrapper", [], function($message) use ($order, $document)
        {
            $message->subject("Your invoice!");
            $message->from("info@example.com", "NTPie");
            $message->to($order->account->email);
            
            $message->attach($document, [
                "as" => "Invoice" . $order->id,
                "mime" => "application/pdf"
            ]);
        });
    }
}