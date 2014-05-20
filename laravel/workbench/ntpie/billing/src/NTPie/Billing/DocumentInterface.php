<?php

namespace NTPie\Billing;

interface DocumentInterface
{
    public function create($order);
}