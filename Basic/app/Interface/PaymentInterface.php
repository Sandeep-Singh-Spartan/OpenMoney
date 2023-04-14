<?php

namespace App\Interface;

interface PaymentInterface
{
    public function createPaymentToken($data);
    public function receivedResponseFromServer($request);

}
