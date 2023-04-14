<?php

namespace App\Implementation;

use App\Helpers\ActivityLoggerHelper;
use App\Helpers\SendingNotificationHelper;
use App\Interface\UserInterface;
use App\Models\User;
use App\Service\SendNotificationService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use mysql_xdevapi\Exception;

class UserImplementation implements UserInterface{

    public function login($login)
    {
        // TODO: Implement login() method.
    }

    public function registration($allData){
        $allData['password'] = bcrypt($allData['password']);
        //dd($allData);
        try {
            $user = User::create($allData);
            $emailData=SendingNotificationHelper::preparedNotification($user,0);
            ActivityLoggerHelper::log("User Registered Successfully", (array)$user);
            return "User Registered Successfully";
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        };
        return "opps! User facing issues";
        //return response()->json($user,200);
    }

    public function logout()
    {
        // TODO: Implement logout() method.
    }
}
