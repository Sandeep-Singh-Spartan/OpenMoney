<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use App\Interface\PaymentInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller{


    private $paymentInterface;
    public function __construct( PaymentInterface $paymentInterface){
        $this->paymentInterface = $paymentInterface;
    }

    public function createPaymentToken( Request $request){
        $request = $request->all();
//        dd($request);
        return $this->paymentInterface->createPaymentToken($request);
    }
    public function receivedResponseFromServer(Request $request){
        //dd($request->all());
        return $this->paymentInterface->receivedResponseFromServer($request->all());
    }

}
