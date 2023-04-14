<?php

namespace App\Service;

use GuzzleHttp\Client;

class PaymentService{

    public static function createPaymentToken($customerInfo){
        $jsonBody = json_encode($customerInfo);
        $client = new Client();
        $create_base_url = config('third_party_data.payment_gate_way_url');
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

            $data = json_decode( $response->getBody()->getContents());
            //dd($data);
            return $data;;
        }catch(Exception $e){
            echo 'Message ThirdPartyApI: ' . $e->getMessage();
        }
        return "Something Went wrong";

    }

}
