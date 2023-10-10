<?php

namespace Moris\Practice\payment\Interface;

interface PaymentInterface
{
    public function authorize();
    public function charge();
    public function refund();
}