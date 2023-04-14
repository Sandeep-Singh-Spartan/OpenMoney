<?php

namespace App\Implementation;

use App\Interface\PaymentInterface;
use App\Jobs\MyQueueJob;
use App\Models\Account;
use App\Models\PgTransaction;
use App\Service\PaymentService;
use Exception;

class PaymentImplementation implements PaymentInterface{

    public static $token;

    public function createPaymentToken($data){
         $data['currency'] = "INR";
         $data['mtx'] = uniqid() . mt_rand(100000, 999999);;
         $result=PaymentService::createPaymentToken($data);
         $ans = (array)($result);
         $ans['customer_contact_number'] =$result->customer->contact_number;
         $ans['customer_email_id'] =$result->customer->email_id;
         $ans['customer_id'] =$result->customer->id;
         $ans['customer_entity'] =$result->customer->entity;
         $ans['token'] =$result->id;
        try {
            $data=PgTransaction::create($ans);
            return $data['token'];
        }catch (Exception $e){
            echo $e;
        }
    }

    public function receivedResponseFromServer($request)
    {
        $token =$request["ocResponse"]["payment_token_id"];
        MyQueueJob::dispatch($request)->onConnection('redis')->onQueue('processQueue');
        return $token;;

    }
}
