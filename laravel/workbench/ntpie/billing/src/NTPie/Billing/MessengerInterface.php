<?php

namespace NTPie\Billing;

interface MessengerInterface
{
    public function send(
        $order,
        $document
    );
}

