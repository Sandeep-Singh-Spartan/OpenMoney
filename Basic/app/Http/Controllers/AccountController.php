<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\RegisterRequest;
use App\Implementation\AccountImplementation;
use App\Interface\AccountInterface;
use Illuminate\Http\Request;

class AccountController extends Controller{
    //

    private $accountInterface;
    public function __construct( AccountInterface $accountInterface){
        $this->accountInterface = $accountInterface;
    }

    public function createVirtualAccount( Request $request){
        $request = $request->all();
        return $this->accountInterface->createVirtualAccount($request);
    }

    public function getVirtualAccountBalance(Request $request){
        $request = $request->all();
        return $this->accountInterface->getAccountBalance($request['user']->email);
    }
}
