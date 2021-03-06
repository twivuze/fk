<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    function interestProcessing($transfer){
    $rate=0;
    $totalRecover=$transfer->amount;
    $totalInstalment=0;
    $amountToPay=$transfer->amount;
    $totalRepayment=$transfer->amount;

        if($transfer->recoverPeriod && $transfer->recoverPeriod->category=='day'){
        
        $rate=$transfer->recoverPeriod->period*$transfer->rate;
        $totalRecover=$transfer->amount*$rate/100;
        $totalRepayment=$transfer->amount+$totalRecover;

                if($transfer->instalmentPeriod){
                    $totalInstalment=$totalRecover*$transfer->instalmentPeriod->period;
                    $amountToPay=$transfer->amount*$transfer->instalmentPeriod->period;
                }
         }

         if($transfer->recoverPeriod && $transfer->recoverPeriod->category=='month'){

            $rate=$transfer->recoverPeriod->period*30*$transfer->rate;
            $totalRecover=$transfer->amount*$rate/100;
            $totalRepayment=$transfer->amount+$totalRecover;

                if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='month'){
                    $totalInstalment=$totalRecover*$transfer->instalmentPeriod->period;
                    $amountToPay=$transfer->amount*$transfer->instalmentPeriod->period;
                }

                if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='day'){
                    $totalInstalment=$totalRecover*$transfer->instalmentPeriod->period/30;
                    $amountToPay=$transfer->amount*$transfer->instalmentPeriod->period/30;
                }
         }

         if($transfer->recoverPeriod && $transfer->recoverPeriod->category=='year'){

            $rate=$transfer->recoverPeriod->period*12*$transfer->rate;
            $totalRecover=$transfer->amount*$rate/100;

            $totalRepayment=$transfer->amount+$totalRecover;

                if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='year'){
                    $totalInstalment=($totalRecover*$transfer->instalmentPeriod->period);
                    $amountToPay=$transfer->amount*$transfer->instalmentPeriod->period;
                }

                if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='month'){
                    $totalInstalment=( ($totalRecover*$transfer->instalmentPeriod->period) /12 );
                    $amountToPay=($transfer->amount*$transfer->instalmentPeriod->period)/12;
                }
                if($transfer->instalmentPeriod && $transfer->instalmentPeriod->category=='day'){
                    $totalInstalment=($totalRecover*$transfer->instalmentPeriod->period)/365;
                    $amountToPay=($transfer->amount*$transfer->instalmentPeriod->period)/365;
                }
         }

       

         //

         return ['totalRecover'=>round($totalRecover,2),'totalInstalment'=>round($totalInstalment,2),'amountToPay'=>round($amountToPay,2),'totalRepayment'=>round($totalRepayment,2)];
    }

    public static function getNextYear($date,$year=1)
    {
        // set birthday from current year
        $date = Carbon::createFromFormat('Y-m-d', $date);
        // \Log::info(Carbon::now()->year);
        // $date->year(Carbon::now()->year);

        // diff from 31 may to now
        // its negative than add one year, otherwise use the current
        // if (Carbon::now()->diffInDays($date, false) > 0) {
        //     return $date->format('Y-m-d');
        // }

        return $date->addYear($year)->format('Y-m-d');
    }

    public static function getNextMonth($date,$month=1)
    {
        // set birthday from current year
        $date = Carbon::createFromFormat('Y-m-d', $date);
        // \Log::info(Carbon::now()->year);
        // $date->month(Carbon::now()->month);

        // diff from 31 may to now
        // its negative than add one year, otherwise use the current
        // if (Carbon::now()->diffInDays($date, false) > 0) {
        //     return $date->format('Y-m-d');
        // }

        return $date->addMonth($month)->format('Y-m-d');
    }

    public static function getNextDay($date,$day=1)
    {
        // set birthday from current year
        $date = Carbon::createFromFormat('Y-m-d', $date);
        // \Log::info(Carbon::now()->year);
        // $date->day(Carbon::now()->day);

        // diff from 31 may to now
        // its negative than add one year, otherwise use the current
        // if (Carbon::now()->diffInDays($date, false) > 0) {
        //     return $date->format('Y-m-d');
        // }

        return $date->addDays($day)->format('Y-m-d');
    }
    
    public static function getLastDay($date,$day=1)
    {
        // set birthday from current year
        $date = Carbon::createFromFormat('Y-m-d', $date);
        // \Log::info(Carbon::now()->year);
        // $date->day(Carbon::now()->day);

        return $date->subDays($day)->format('Y-m-d');
    }

    public static function getNow()
    {
        return Carbon::now()->format('Y-m-d');
    }

    public static function getYesterday()
    {
       
        return Carbon::yesterday()->format('Y-m-d');
    }
    
}
