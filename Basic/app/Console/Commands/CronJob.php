<?php

namespace App\Console\Commands;

use App\Implementation\AccountImplementation;
use App\Models\Account;
use App\Service\AccountThirdPartyService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cron-job {virtual_accounts_id} {email_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->updateAccountBalance();

    }

    private function updateAccountBalance()
    {
        $statusCode="";
        $this->info("welcome to cron job");
        $pk = $this->argument("virtual_accounts_id");
        $email = $this->argument("email_id");
        dd($pk,$email);
        $accounts = Account::all();
        $obj = new AccountImplementation();
        foreach ($accounts as $account) {
            $email = $account->email_id;
            $response=$obj->getAccountBalance($email);
            $statusCode = response($response,200);
            echo $statusCode;
        }
        Log::info('API response status code: ' . $statusCode);
        //Error Code: 1175. You are using safe update mode and you tried to update a table without a WHERE that uses a KEY column.  To disable safe mode, toggle the option in Preferences -> SQL Editor and reconnect.

    }
}
