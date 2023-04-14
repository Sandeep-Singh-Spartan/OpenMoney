<?php

namespace App\Console\Commands;

use App\Implementation\PaymentImplementation;
use Illuminate\Console\Command;

class TestJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-job';

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
        $pi = new PaymentImplementation();

        $pi->receivedResponseFromServer([1,2,3]);
    }
}
