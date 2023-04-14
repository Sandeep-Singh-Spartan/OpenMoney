<?php

namespace App\Service;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class SendNotificationService {
    public function __construct(){}

    function sendMailToUser($data){

        Mail::to("sandeepgaurdec13@gmail.com")->send(new TestEmail($data));
    }



}
