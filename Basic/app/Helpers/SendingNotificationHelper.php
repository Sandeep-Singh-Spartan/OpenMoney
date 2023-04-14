<?php

namespace App\Helpers;

use App\Mail\TestEmail;
use App\Service\SendNotificationService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\CircularDependencyException;
use Illuminate\Support\Facades\Mail;

class SendingNotificationHelper{
    /**
     * @throws CircularDependencyException
     * @throws BindingResolutionException
     */
    public static function preparedNotification($data , $type){
        $result = [];
        if($type==0){
            $result['subject'] = 'Your Registration is Successful';
            $result['name'] = $data['name'];
            $result['email'] = $data['email'];
            $result['mobile_number'] = $data['mobile_number'];

        }else{
            $result['subject'] = 'Your Virtual Account is created Successfully';
            $result['VANumber'] = $data['virtual_account_number'];
            $result['balance'] = $data['balance'];
            $result['mobile_number'] = $data['mobile_number'];
        }

        try {
            app(SendNotificationService::class)->sendMailToUser($result);
        } catch (BindingResolutionException|CircularDependencyException $e) {
        }

        return $result;
        //Mail::to("sandeepgaurdec13@gmail.com")->send(new SendNotificationService($result));

    }

}
