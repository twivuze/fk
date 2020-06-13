<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Models\Repayment;
use App\Models\Transfer;
use App\User;
use Illuminate\Support\Facades\Mail;
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
    
    $user=new User;
    $repayments = Repayment::where('status','current')->where('reminder_date',$user->getNow())->get();
    foreach($repayments as $repayment){
        $repayment->status='pending';
        $repayment->save();
        $enterprise= \App\Models\LoanApplication::find($repayment->enterprise_id);
        if( isset($enterprise->email)){
            Mail::to($enterprise->email)
            ->queue(new \App\Mail\Repayment($repayment->id));
        }
      }
     
    }

    public function setOutstandingRepayment()
    {
        //'current','pending','successful','outstanding'
        $user=new User;

        $repayments = Repayment::where('status','pending')->where('next_repay_date',$user->getYesterday())->get();
            foreach($repayments as $repayment1){
                $repayment1->status='outstanding';
                $repayment1->save();

                $enterprise= \App\Models\LoanApplication::find($repayment1->enterprise_id);
                if( isset($enterprise->email)){
                    Mail::to($enterprise->email)
                    ->queue(new \App\Mail\Repayment($repayment1->id));
                }

                if(intval($repayment1->total_loan_remain_amount) > 0){

                 $repayment =Repayment::where('loan_id',$repayment1->loan_id)
                ->where('status','!=','current')->orderBy('id','DESC')->first();
                if(!$repayment){
            
        
                $transfer=Transfer::findOrFail($repayment1->loan_id);
                $repay_code=\Illuminate\Support\Str::random(8);
                $resp=$user->interestProcessing($transfer);


                if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='day'){
                    $repay_date=$user->getNextDay($repayment1->next_repay_date,$transfer->instalmentPeriod->period);
                }
                if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='month'){
                    $repay_date=$user->getNextMonth($repayment1->next_repay_date,$transfer->instalmentPeriod->period);
                }
        
                if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='year'){
                    $repay_date=$user->getNextYear($repayment1->next_repay_date,$transfer->instalmentPeriod->period);
                }

                $outstanding= new Repayment([
                    'reminder_date'=>$user->getLastDay($repay_date),
                    'loan_id'=>$transfer->id,
                    'enterprise_id'=>$transfer->enterprise_id,
                    'repay_code'=>$repay_code,
                    'currency'=>$transfer->currency,
                    'repayer'=>$transfer->enterprise,
                    'repay_date'=>$repay_date,
                    'next_repay_date'=>$repay_date,
                    'interest_amount'=>$resp['totalInstalment'],
                    'amount_without_interst'=>$resp['amountToPay'],
                    'total_amount'=>$resp['amountToPay']+$resp['totalInstalment'],
                    'repay_reminder_day'=>$transfer->reminder_days,
                    'center_id'=>$repayment1->center_id,
                    'did_repay'=>false,
                    'total_loan_remain_amount'=>($repayment1->total_loan_remain_amount-$repayment1->total_amount),
                ]);

                $outstanding->save();
                 }
            }
        }
    }

}
