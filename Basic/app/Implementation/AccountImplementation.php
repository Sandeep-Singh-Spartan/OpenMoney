<?php

namespace App\Implementation;

use App\Facades\MyFacade;
use App\Helpers\SendingNotificationHelper;
use App\Interface\AccountInterface;
use App\Models\Account;
use App\Models\User;
use App\Service\AccountThirdPartyService;
use App\Service\SendNotificationService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AccountImplementation implements AccountInterface {

    public function __construct(){}
    public function createVirtualAccount($account)
    {
        $res = [];
        $contact_type= "Customer";
        $res['name'] = $account['user']->name;
        $res['primary_contact'] = $account['user']->name;
        $res['contact_type'] = $contact_type;
        $res['email_id'] = $account['user']->email;
        $res['mobile_number'] = $account['user']->mobile_number;
        $userId = $account['user']->id;
        $response = MyFacade::createVAccount($res);
        $response->landline_number = $res['mobile_number'] ;
        $result = (array) $response;
        $result["users_id"] = $userId;
        $result["balance"] = 0.0;
        try {
            $data=Account::create($result);
              $emailData= SendingNotificationHelper::preparedNotification($data,1);
              //Mail::to($data["email_id"])->send(new SendNotificationService($emailData));
            return "Account Created";
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        };

        return "account_holder_name or account_type is not present";
    }

    public function getAccountBalance($email)
    {
        $balance = AccountThirdPartyService::getVirtualBalance();
        try {
            $obj = Account::firstWhere('email_id',$email);
            $obj->update(['balance' => $balance ]);
            return $obj;

        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            throw $e;
        };
    }
}
