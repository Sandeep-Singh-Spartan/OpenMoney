<?php

namespace App\Service;

use GuzzleHttp\Client;
//use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Log;


class AccountThirdPartyService
{
    public static function createVAccount($customerInfo){
        Log::channel('daily_va_creation_logs')->info("Virtual Account Created Request", (array)$customerInfo);
        $jsonBody = json_encode($customerInfo);
        $client = new Client();
        $create_base_url = config('third_party_data.create_base_url1');
        $API_Key = config('third_party_data.crate_base_url_API_KEY1');
        $SECRETE_Key = config('third_party_data.crate_base_url_Secret_KEY1');
        $api_key_secrete= 'Bearer'.' '.$API_Key.':'.$SECRETE_Key;
        try{
            $response = $client->request('POST',  $create_base_url, [
                'body' => $jsonBody,
                'headers' => [
                    'Authorization' => $api_key_secrete,
                    'content-type' => 'application/json',
                ],
            ]);
            $data = json_decode( $response->getBody());
            Log::channel('daily_va_creation_logs')->info("Virtual Account Created Response", (array)$data);
            return $data->data;;
        }catch(Exception $e){
            echo 'Message ThirdPartyApI: ' . $e->getMessage();
        }
        return "Something Went wrong";

    }

    public static function getVirtualBalance(){
        //Log::useDailyFiles(storage_path().'/logs/virtual_account/getBalance.log');
        $client = new Client();
        $create_base_url_API_KEY = config('third_party_data.balance_base_url');
        Log::info("BaseURL=".$create_base_url_API_KEY);
        $API_Key = config('third_party_data.create_base_url_API_KEY');
        $SECRETE_Key = config('third_party_data.create_base_url_Secret_key');
        $api_key_secrete= 'Bearer'.' '.$API_Key.':'.$SECRETE_Key;
        try{
            $response = $client->request('GET', $create_base_url_API_KEY, [
                'headers' => [
                    'Authorization' => $api_key_secrete,
                ],
            ]);
            Log::debug("response=".$response);
            $data = json_decode( $response->getBody());

           // Log::channel('daily_balance_fetch_logs')->info("Virtual Account Created Response", (array)$data);
            return $data->current_balance;
        }catch(Exception $e){
            echo 'Message When Hitting ThirdPartyApI: ' . $e->getMessage();
        }
        return "Something Went wrong";

    }

}
