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

                    $loanTransfered = \App\Models\Transfer::where('type','Loan')->sum('amount');
                    $donationsTransfered = \App\Models\Transfer::where('type','Donations')->sum('amount');

                    $amountLoanInternalFunds = \App\Models\InternalFunder::where("type",'Loan')->sum('fund');

                    $amountDonateInternalFunds = \App\Models\InternalFunder::where("type",'Donation')->sum('fund');

                    $loan=intval($amountLend)+intval($amountLoanInternalFunds);

                    $donate=intval($amountDonate)+intval($amountDonateInternalFunds);
?>
<br>

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
                    Total Loans Transfered
                    <hr>
                    <h2 class="text-center">
                        {{ number_format(intval($loanTransfered), 2) }}
                    </h2>

                </div>
            </div>
        </div>


        <div class="col-sm-3 box-warning">
            <div class="box box-warning">
                <div class="box-body">
                    Total Repayments
                    <hr>
                    <h2 class="text-center">
                        {{ number_format(intval(0), 2) }}
                    </h2>

                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="box box-info">
                <div class="box-body">
                    Total Loans Balance Due
                    <hr>
                    <h2 class="text-center">
                        {{ number_format(intval($loanTransfered-0), 2) }}
                    </h2>

                </div>
            </div>
        </div>

    </div>





</section>
