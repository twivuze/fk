<?php $visitorss=\App\Models\Vistors::where('id','!=',0)->count(); ?>

<?php $dailyVisitors=\App\Models\Vistors::whereRaw('Date(created_at) = CURDATE()')->count();

$country = \App\Models\Vistors::select('country', \DB::raw('MAX(country) as country'))
                   ->where('country','!=',null)
                   ->groupBy('country')->get();

                   $monthlyVisitors = \App\Models\Vistors::whereMonth('created_at', date('n'))
                ->count();

                $yearlyVisitors =\App\Models\Vistors::whereYear('created_at', date("Y"))
                ->count();
?>
<section class="content-header">

    <div class="row">
        <div class="col-sm-3">
            <div class="box box-info">
                <div class="box-body">
                    All Vistor(s)
                    <hr>
                    <h2 class="text-center">{{$visitorss}}</h2>

                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="box box-info">
                <div class="box-body">
                    Daily Vistor(s)
                    <hr>
                    <h2 class="text-center">{{$dailyVisitors}}</h2>

                </div>
            </div>
        </div>

        <div class="col-sm-3 box-info">
            <div class="box box-info">
                <div class="box-body">
                    Monthly Vistor(s)
                    <hr>
                    <h2 class="text-center">{{$monthlyVisitors}}</h2>

                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="box box-info">
                <div class="box-body">
                    Yearly Vistor(s)
                    <hr>
                    <h2 class="text-center">{{$yearlyVisitors}}</h2>

                </div>
            </div>
        </div>

    </div>

</section>
<br>

<?php 

              
                    $amountLend = \App\Models\LenderInvoice::sum('amount');
                    $amountDonate = \App\Models\DonationInvoice::sum('amount');

                    $donationsTransfered = \App\Models\Transfer::where('type','Donations')->sum('amount');

                    $amountLoanInternalFunds = \App\Models\InternalFunder::where("type",'Loan')->sum('fund');

                    $amountDonateInternalFunds = \App\Models\InternalFunder::where("type",'Donation')->sum('fund');

                    $loan=intval($amountLend)+intval($amountLoanInternalFunds);

                    $donate=intval($amountDonate)+intval($amountDonateInternalFunds);

                    $pendingRepayments=\App\Models\Repayment::where('status','pending')->get();

                    $outstandingRepayments=\App\Models\Repayment::where('status','outstanding')->get();

                    $amountRepayment= \App\Models\Repayment::where('status','successful')->sum('total_amount');

                    $loanTransfered = \App\Models\Transfer::where('type','Loan');
                    $transfered=$loanTransfered->sum('amount');
                    $user=new \App\User();
                    $sub_total=array();
                    $totalRecover=array();
                        foreach($loanTransfered->get() as $transfer){
                            $resp=$user->interestProcessing($transfer);
                            array_push($sub_total, $resp['totalRepayment']);
                            array_push($totalRecover, $resp['totalRecover'] );
                        }
?>
<br>
<?php if(count($pendingRepayments) > 0){ ?>


<div class="alert alert-warning mt-5 ml-5 text-center title" role="alert">

    {{count($pendingRepayments)}} Pending of Repayment Invoice(s).
</div>
<?php } ?>

<?php if(count($outstandingRepayments) > 0){ ?>


<div class="alert alert-danger mt-5 ml-5 text-center title" role="alert">

    {{count($outstandingRepayments)}} Outstanding of Repayment Invoice(s).
</div>
<?php } ?>
<section class="content-header" id="receipt-content">

    <div class="row">

        <div class="col-sm-3">
            <div class="box box-success">
                <div class="box-body">
                    Total Donations Transfered
                    <hr>
                    <h2 class="text-center">
                        {{ number_format(intval($donationsTransfered), 2) }}
                    </h2>

                </div>
            </div>
        </div>


        <div class="col-sm-3">
            <div class="box box-primary">
                <div class="box-body">
                    Loans Transfered
                    <hr>
                    <h2 class="text-center">
                        {{ number_format(doubleval(array_sum($sub_total)), 2) }}
                    </h2>
                    <small
                        style="float:right;font-weight:bold">{{ number_format(doubleval(array_sum($totalRecover)), 2) }}
                        interset rate of {{ number_format(doubleval($transfered), 2) }}
                    </small>
                </div>
            </div>
        </div>

        <div class="col-sm-3 box-warning">
            <div class="box box-warning">
                <div class="box-body">
                    Repayments
                    <hr>
                    <h2 class="text-center">
                        {{ number_format(intval($amountRepayment), 2) }}
                    </h2>
                    <small
                        style="float:right;font-weight:bold">{{ number_format(doubleval(array_sum($totalRecover)), 2) }}
                        interset rate of {{ number_format(doubleval($transfered), 2) }}
                    </small>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="box box-info">
                <div class="box-body">
                    Loans Balance Due
                    <hr>
                    <h2 class="text-center">
                        {{ number_format(intval(doubleval(array_sum($sub_total))-intval($amountRepayment)), 2) }}
                    </h2>
                    <small
                        style="float:right;font-weight:bold">{{ number_format(doubleval(array_sum($totalRecover)), 2) }}
                        interset rate of {{ number_format(doubleval($transfered), 2) }}
                    </small>
                </div>
            </div>
        </div>

    </div>

  

    
    <br>
    <br>

    <div class="content">
        <div class="clearfix"></div>



        <div id="exTab1" class="">
            <ul class="nav nav-pills">
                <li class="active">
                    <a href="#1a" data-toggle="tab">Pending Repayments</a>
                </li>
                <li><a href="#2a" data-toggle="tab">Outstanding Repayments</a>
                </li>
                <li><a href="#3a" data-toggle="tab">Loan(S) Transfer</a>
                </li>


            </ul>

            <div class="tab-content clearfix">
                <div class="tab-pane active" id="1a">
                    <div class="box  box-warning">
                        <div class="box-body">
                            @include('analyitcs.repay',['repayments'=>$pendingRepayments])
                        </div>
                    </div>
                    <div class="text-center">



                    </div>
                </div>
                <div class="tab-pane" id="2a">
                    <div class="box box-danger">
                        <div class="box-body">
                            @include('analyitcs.repay',['repayments'=>$outstandingRepayments])
                        </div>

                        <div class="text-center">

                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="3a">
                    <div class="box box-primary">
                        <div class="box-body">
                            @include('analyitcs.loan-transfer',['transfers'=>$loanTransfered->get()])
                        </div>

                        <div class="text-center">

                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>




</section>
