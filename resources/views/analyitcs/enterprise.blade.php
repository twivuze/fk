<?php 

              
                    $amountLend = \App\Models\LenderInvoice::where('enterprise_id',$enterprise->id)->sum('amount');
                    $amountDonate = \App\Models\DonationInvoice::where('enterprise_id',$enterprise->id)->sum('amount');
                    $pendingRepayments=\App\Models\Repayment::where('enterprise_id',$enterprise->id)->
                    where('status','current')->get();

                    $outstandingRepayments=\App\Models\Repayment::where('enterprise_id',$enterprise->id)->
                    where('status','current')->get();

                    $loanTransfered = \App\Models\Transfer::where('type','Loan')
                    ->where('enterprise_id',$enterprise->id);
                    $transfered=$loanTransfered->sum('amount');
                    $user=new \App\User();
                    $sub_total=array();
                    $totalRecover=array();
                        foreach($loanTransfered->get() as $transfer){
                            $resp=$user->interestProcessing($transfer);
                            array_push($sub_total, $resp['totalRepayment']);
                            array_push($totalRecover, $resp['totalRecover'] );
                        }

                    $donationsTransfered = \App\Models\Transfer::where('type','Donations')
                    ->where('enterprise_id',$enterprise->id)->sum('amount');


                    $amountLoanInternalFunds = \App\Models\InternalFunder::where("type",'Loan')
                    ->where('enterprise_id',$enterprise->id)->sum('fund');

                    $amountDonateInternalFunds = \App\Models\InternalFunder::where("type",'Donation')
                    ->where('enterprise_id',$enterprise->id)->sum('fund');

                    $loan=intval($amountLend)+intval($amountLoanInternalFunds);

                    $donate=intval($amountDonate)+intval($amountDonateInternalFunds);

                    $amountRepayment= \App\Models\Repayment::where('enterprise_id',$enterprise->id)
                   -> where('status','successful')->sum('total_loan_remain_amount');
?>
<br>
<!-- <div class="print" style="margin-left:15px" class="float-right mt-4 ml-5" id="print-{{$enterprise->id}}">
							<a href="#" class="btn btn-info float-right"  onclick="event.preventDefault(); printThis(<?php echo $enterprise->id; ?>);">
								<i class="fa fa-print"></i>
								Print
							</a>
						</div> -->
<section class="content-header" id="receipt-content-{{$enterprise->id}}">

    <div class="row">
    <div class="col-sm-12">
            <div class="box box-white">
                <div class="box-body">
                   Business: {{$enterprise->business_name}}, Owner:{{$enterprise->name}}, Address:{{$enterprise->address}}-{{$enterprise->country}}
                </div>
            </div>
        </div>

    <div class="col-sm-3">
            <div class="box box-success">
                <div class="box-body">
                    Donations Transfered
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
                    <small style="float:right;font-weight:bold">{{ number_format(doubleval(array_sum($totalRecover)), 2) }} interset rate of {{ number_format(doubleval($transfered), 2) }}
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
                    <small style="float:right;font-weight:bold">{{ number_format(doubleval(array_sum($totalRecover)), 2) }} interset rate of {{ number_format(doubleval($transfered), 2) }}
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
                    <small style="float:right;font-weight:bold">{{ number_format(doubleval(array_sum($totalRecover)), 2) }} interset rate of {{ number_format(doubleval($transfered), 2) }}
                    </small>
                </div>
            </div>
        </div>

    </div>

    <table class="m=5" style="width:100%;border:0px solid">
        <tr rowspan="2">
            <th>
                <b>{{ number_format(intval($loan), 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Loans</b>
            </th>
            <th>
                <b style="text-right; float:right">{{ number_format(intval($enterprise->lender_initial_target), 2) }}
                    {{$enterprise->currency?$enterprise->currency:'Rwf'}}
                    Target</b>


            </th>

        </tr>
        <tr>
            <th colspan="2">
                <div class="progress" style="height:8px;">
                    <div class="progress-bar"
                        style="width:{{(intval($loan)*100)/intval($enterprise->lender_initial_target)}}%; background:#58d77a;"
                        role="progressbar"
                        aria-valuenow="{{(intval($loan)*100)/intval($enterprise->lender_initial_target)}}"
                        aria-valuemin="0" aria-valuemax="100"></div>

                </div>
                <div class="text-center" style="color: #58d77a;font-weight:800">

                    <?php if( (intval($enterprise->lender_initial_target)-$loan)  > 0){ ?>
                    {{ number_format( intval($enterprise->lender_initial_target)-$loan, 2) }}
                    {{$enterprise->currency?$enterprise->currency:'Rwf'}} Loans Remaining

                    <?php }else{ ?>
                    {{ number_format( $loan, 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Loan Target
                    Reached

                    <?php }?>
                </div>
            </th>

        </tr>
    </table>

    <table class="bg-white m-5" style="width:100%;border:0px solid">
                            <tr rowspan="2">
                                <th>
                                    <b>{{ number_format(intval($donate), 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Donations</b>
                                </th>
                                <th>
                                    <b style="text-right; float:right">{{ number_format(intval($enterprise->donor_initial_target), 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}}
                                        Target</b>


                                </th>

                            </tr>
                            <tr>
                                <th colspan="2">
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar"
                                            style="width:{{(intval($donate)*100)/intval($enterprise->donor_initial_target)}}%;"
                                            role="progressbar"
                                            aria-valuenow="{{(intval($donate)*100)/intval($enterprise->donor_initial_target)}}"
                                            aria-valuemin="0" aria-valuemax="100"></div>

                                    </div>
                                    <div class="text-center" style="color: #58d77a;font-weight:800">
                                    <?php if( (intval($enterprise->donor_initial_target)-$donate)  > 0){ ?>
                                    {{ number_format( intval($enterprise->donor_initial_target)-$donate, 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Donation remaining

                                    <?php }else{ ?>
                                    {{ number_format( $donate, 2) }} {{$enterprise->currency?$enterprise->currency:'Rwf'}} Donation Target Reached

                                    <?php }?>
                                  </div>
                                </th>

                            </tr>
                        </table>


                        <section class="content-header">
       
       <br>
        <h1 class="pull-right">
           <!-- <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('centers.create') }}">Add New</a> -->
        </h1>
    </section>
    <br>
    <br>
    <div class="content">
        <div class="clearfix"></div>

       

        <div id="exTab1" class="">
        <ul class="nav nav-pills">
            <li class="active">
                <a href="#1a"  data-toggle="tab">Pending Repayments</a>
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



<script type="text/javascript">
			var printThis = function(id){
				document.getElementById('print-'+id).style.display="none";
				var divToPrint=document.getElementById('receipt-content-'+id);
				var newWin=window.open('','Print-Window','scrollbars=yes,resizable=yes,width=650,height=1000');
				newWin.document.open();
				newWin.document.write('<html><head><title>Receipt</title><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="generator" content="Ganza respcie"><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1"><link rel="shortcut icon" href="/assets/images/a-1-122x30.png" type="image/x-icon"><meta name="description" content=""><link rel="stylesheet" href="/assets/web/assets/mobirise-icons/mobirise-icons.css"><link rel="stylesheet" href="/assets/web/assets/mobirise-icons2/mobirise2.css"><link rel="stylesheet" href="/assets/facebook-plugin/style.css"><link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-grid.min.css"><link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-reboot.min.css"> <link rel="stylesheet" href="/assets/tether/tether.min.css"><link rel="stylesheet" href="/assets/dropdown/css/style.css"><link rel="stylesheet" href="/assets/animatecss/animate.min.css"><link rel="stylesheet" href="/assets/theme/css/style.css"><link rel="stylesheet" href="/assets/gallery/style.css"><link rel="stylesheet" href="/assets/socicon/css/styles.css"><link rel="preload" as="style" href="/assets/mobirise/css/mbr-additional.css"> <link rel="stylesheet" href="/assets/mobirise/css/mbr-additional.css" type="text/css"> <style>.receipt-content .logo a:hover{text-decoration:none;color:#7793c4;font-family:Comfortaa,display}.receipt-content .invoice-wrapper{background:#fff;border:1px solid #cdd3e2;box-shadow:0 0 1px #ccc;padding:40px 40px 60px;margin-top:40px;border-radius:4px;font-family:Comfortaa,display}.receipt-content .invoice-wrapper .payment-details span{color:#a9b0bb;display:block;font-family:Comfortaa,display}.receipt-content .invoice-wrapper .payment-details a{display:inline-block;margin-top:5px}.receipt-content .invoice-wrapper .line-items .print a{display:inline-block;border:1px solid #9cb5d6;padding:13px 13px;border-radius:5px;color:#708dc0;font-size:13px;-webkit-transition:all .2s linear;-moz-transition:all .2s linear;-ms-transition:all .2s linear;-o-transition:all .2s linear;transition:all .2s linear}.receipt-content .invoice-wrapper .line-items .print a:hover{text-decoration:none;border-color:#333;color:#333}.receipt-content{background:#eceef4}@media (min-width:1200px){.receipt-content .container{width:900px}}.receipt-content .logo{text-align:center;margin-top:50px}.receipt-content .logo a{font-family:Comfortaa,display;font-size:36px;letter-spacing:.1px;color:#555;font-weight:300;-webkit-transition:all .2s linear;-moz-transition:all .2s linear;-ms-transition:all .2s linear;-o-transition:all .2s linear;transition:all .2s linear}.receipt-content .invoice-wrapper .intro{line-height:25px;color:#444}.receipt-content .invoice-wrapper .payment-info{margin-top:25px;padding-top:15px}.receipt-content .invoice-wrapper .payment-info span{color:#a9b0bb}.receipt-content .invoice-wrapper .payment-info strong{display:block;color:#444;margin-top:3px}@media (max-width:767px){.receipt-content .invoice-wrapper .payment-info .text-right{text-align:left;margin-top:20px}}.receipt-content .invoice-wrapper .payment-details{border-top:2px solid #ebecee;margin-top:30px;padding-top:20px;line-height:22px}@media (max-width:767px){.receipt-content .invoice-wrapper .payment-details .text-right{text-align:left;margin-top:20px}}.receipt-content .invoice-wrapper .line-items{margin-top:40px}.receipt-content .invoice-wrapper .line-items .headers{color:#a9b0bb;font-size:13px;letter-spacing:.3px;border-bottom:2px solid #ebecee;padding-bottom:4px}.receipt-content .invoice-wrapper .line-items .items{margin-top:8px;border-bottom:2px solid #ebecee;padding-bottom:8px}.receipt-content .invoice-wrapper .line-items .items .item{padding:10px 0;color:#696969;font-size:15px}@media (max-width:767px){.receipt-content .invoice-wrapper .line-items .items .item{font-size:13px}}.receipt-content .invoice-wrapper .line-items .items .item .amount{letter-spacing:.1px;color:#84868a;font-size:16px}@media (max-width:767px){.receipt-content .invoice-wrapper .line-items .items .item .amount{font-size:13px}}.receipt-content .invoice-wrapper .line-items .total{margin-top:30px}.receipt-content .invoice-wrapper .line-items .total .extra-notes{float:left;width:40%;text-align:left;font-size:13px;color:#7a7a7a;line-height:20px}@media (max-width:767px){.receipt-content .invoice-wrapper .line-items .total .extra-notes{width:100%;margin-bottom:30px;float:none}}.receipt-content .invoice-wrapper .line-items .total .extra-notes strong{display:block;margin-bottom:5px;color:#454545}.receipt-content .invoice-wrapper .line-items .total .field{margin-bottom:7px;font-size:14px;color:#555}.receipt-content .invoice-wrapper .line-items .total .field.grand-total{margin-top:10px;font-size:16px;font-weight:500}.receipt-content .invoice-wrapper .line-items .total .field.grand-total span{color:#20a720;font-size:16px}.receipt-content .invoice-wrapper .line-items .total .field span{display:inline-block;margin-left:20px;min-width:85px;color:#84868a;font-size:15px}.receipt-content .invoice-wrapper .line-items .print{margin-top:50px;text-align:center}.receipt-content .invoice-wrapper .line-items .print a i{margin-right:3px;font-size:14px}.receipt-content .footer{margin-top:40px;margin-bottom:110px;text-align:center;font-size:12px;color:#969cad}</style> </head><body  onload="window.print();"><section class="features17 cid-rYUhzEzUWQ text-left bg-white" id="features17-2w"> <div class="container">'+divToPrint.innerHTML+'</div></section></body></html>');
			
                newWin.document.close();
				document.getElementById('print-'+id).style.display="block";
			};

			// function generateBarCode(id, amount){
			// 	var url = 'https://api.qrserver.com/v1/create-qr-code/?data='+amount+'&amp;size=100x100';
			// 	document.getElementById("barcode_"+id).setAttribute('src', url);
			// }
		</script>