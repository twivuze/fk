<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
class ScheduledRepayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enterprise:repay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a repayment email and create repayment to all enterprise who have the loan that is in pending or outstanding to repay';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // reminder enterprise to do repayment
        $this->reminderEnterpriseToRepay();

        // Outstanding if repayment is overdue;
        $this->setOutstandingRepayment();
    }

    public function reminderEnterpriseToRepay()
    {
    Log::info('reminder');
    }

    public function setOutstandingRepayment()
    {
        Log::info('outstanding');
    }

}
