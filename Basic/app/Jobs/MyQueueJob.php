<?php

namespace App\Jobs;

use App\Implementation\PaymentImplementation;
use App\Models\Account;
use App\Models\PgTransaction;
use App\Service\SendNotificationService;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MyQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     * @throws GuzzleException
     */
    public function handle(): void
    {
        $this->handleTheFailedJob($this->data);
    }

    /**
     * @throws GuzzleException
     */
    private function handleTheFailedJob($data)
    {
        $client = new Client();
        $token = $data["ocResponse"]["payment_token_id"];
        $response = $client->request('GET', "https://sandbox-icp-api.bankopen.co/api/payment_token/".$token."/payment", [
            'headers' => [
                'Authorization' => 'Bearer 41a2e7d0-cd4e-11ed-bb09-b54d054da30b:36321c71adbfd9e558dd7021c98b51b7e89a3843',
                'accept' => 'application/json',
            ],
        ]);
        $data1 = json_decode( $response->getBody());
        $this->updateDataInDB($data1);
    }

    private function updateDataInDB($data)
    {
        try {
            $obj=PgTransaction::firstWhere('mtx',$data->payment_token->mtx);
            $obj->update(['transaction_status' => $data->payment_token->status ]);
        }catch (Exception $e) {
            echo 'Message: Sandeep' . $e->getMessage();
        };

    }
}
