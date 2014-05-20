<?php

namespace NTPie\Billing;

interface GatewayInterface
{
    public function pay(
        $number,
        $expiry,
        $amount,
        $currency
    );
}

