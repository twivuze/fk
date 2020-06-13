
<?php 
 $invoice = \App\Models\Repayment::find($id);
 $receipt= \App\Models\LoanApplication::find($invoice->enterprise_id);
 ?>
<div id="receipt-content-{{$id}}">
    <div class="receipt-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-wrapper" id="invoice-wrapper">
                        <!-- <div class="intro">
						Hi <strong>John McClane</strong>, 
						<br>
						This is the receipt for a payment of <strong>$312.00</strong> (USD) for your works
					</div> -->

                        <div class="payment-info">
                            <div class="row">
                                <div class="col-6">
                                    <img src='{{env("APP_URL", "https://alltrust.theeventx.com")}}/assets/images/a-122x30.png'
                                        alt="All Trust Consult" title="" style="width:120px;height:auto">

                                    <strong>
                                        All Trust Consult Ltd
                                    </strong>
                                    <strong>
                                        KK 433 Street,
                                        Kicukiro
                                        <br> Kigali-Rwanda <br>
                                        +250 784 872 667 / +260 782 409 571<br />
                                        <a href='#'>
                                            team@alltrustconsult.com
                                        </a>
                                    </strong>
                                </div>

                                <div class="col-6 text-right">
                                    <span>Transaction Date</span>
                                    <strong>{{  $invoice->updated_at }}</strong>
                                    <span>Receipt No.</span>
                                    <strong>{{$invoice->repay_code}}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="payment-details">
                            <div class="row">
                                <div class="col-6">
                                    <span>Client</span>
                                    <strong>
                                        {{$receipt->name}}
                                    </strong>
                                    <p>
                                        {{$receipt->address}} <br>
                                        {{$receipt->contact}} <br>
                                        {{$receipt->country}} <br>
                                        <a href='#'>
                                            {{$receipt->email}}
                                        </a>
                                    </p>
                                </div>
                                <div class="col-6 text-right">
                                 

                                    <table
                                        style="margin-top:40px;width:100%;border-bottom:1px #000 solid;border-top:1px #000 solid">
                                        <tr>
                                            <th>Total paid</th>
                                            <th>{{$invoice->currency}} {{$invoice->total_amount}}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="line-items">
						<div class="headers clearfix">
                                <div class="row">
                                    <div class="col-12">
									<?php if($invoice->status=='successful'){?>
									<h2  style="text-align:center;color:green">{{strtoupper($invoice->status)}} INVOICE</h2>
									<?php } ?>
									<?php if($invoice->status=='pending'){ ?>
									<h2  style="text-align:center;color:orange">{{strtoupper($invoice->status)}} INVOICE</h2>
									<?php } ?>
									<?php if($invoice->status=='outstanding'){ ?>
									<h2  style="text-align:center;color:red">{{strtoupper($invoice->status)}} INVOICE</h2>
									<?php } ?>
									</div>
                                
                                </div>
                            </div>
                            <div class="headers clearfix">
                                <div class="row">
                                    <div class="col-5">Description</div>
                                    <div class="col-2">Quantity</div>
                                    <div class="col-5 text-right">Amount</div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="row item">
                                    <div class="col-5 descs">
                                       Repayment
                                    </div>
                                    <div class="col-2 qty">
                                        1
                                    </div>
                                    <div class="col-5 amount text-right">
                                    {{$invoice->currency}} {{$invoice->total_amount}}
                                    </div>
                                </div>


                                <div class="total text-right">
                                    <p class="extra-notes">
                                        <strong>Extra Notes</strong>

                                        Thanks a lot.
                                    </p>
                                    <div class="field">
                                        Subtotal <span>{{$invoice->currency}} {{$invoice->total_amount}}</span>
                                    </div>
                                    <!-- <div class="field">
								Shipping <span>$0.00</span>
							</div>
							<div class="field">
								Discount <span>4.5%</span>
							</div> -->
							<?php 
                                  $interset = new \App\User();
                                  $transfer = \App\Models\Transfer::find($invoice->loan_id);
                                  $result = $interset->interestProcessing($transfer);
                                  ?>
                                    <div class="field grand-total" style="font-weight:500">
                                        Total <span>{{$invoice->currency}} {{$invoice->total_amount}}</span>
										<br>	<br>
										<table class="table" id="links-table">
                                        <thead>
                                        <tr>
                                        <th>Rate</th>
                                          <th colspan="2">Repayment Amount</th>
                                          <th colspan="2">Interst </th>
                                      </tr>
                                      <tr>
                                            
                                            <th></th>
                                          
                                            <th>Instalment </th>
                                            <th>Recover Period </th>
                                            
                                            <th>Instalment </th>
                                            <th>Recover Period </th>
                                          
                                        </tr>
                                      </thead>
                                       <tbody>
                                       <tr>
                                       <td> {!! $transfer->rate !!}%</td>
                                          <td><b>{!! $transfer->currency !!}  {{$result['amountToPay']+$result['totalInstalment']}}
                                          per 
                                          <br>  <b>{{ $transfer->instalmentPeriod->name }}</b>
                                          </td>

                                          <td><b>{!! $transfer->currency !!}  {{$result['totalRepayment']}}
                                          per <br />  
                                          <b>{{ $transfer->recoverPeriod->name }}</b></td>
                                          <td><b>{{ $transfer->currency }} {{ $result['totalInstalment'] }} per </b>
                                          <br>  <b>{{ $transfer->instalmentPeriod->name }}</b></td>
                                          <td> <b>{{ $transfer->currency }} {{ $result['totalRecover']}} per </b><br />  
                                          <b>{{ $transfer->recoverPeriod->name }}</b></td>

                                          </tr>
                                          </tbody>
                                      </table>
                                    </div>
                                </div>


                            </div>
							<div class="print" id="print-{{$id}}">
							<a href="#"  onclick="event.preventDefault(); printThis(<?php echo $id; ?>);">
								<i class="fa fa-print"></i>
								Print this receipt
							</a>
						</div>
                        </div>

                        <!-- <div class="footer">
					Copyright © 2014. company name
				</div> -->
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

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
