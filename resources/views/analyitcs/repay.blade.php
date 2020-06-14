<div class="table-responsive">
    <table class="table" id="links-table">
        <thead>
        <tr>
        <th>Action</th>
            <th>Code</th>
            <th>Enterprise</th>
            <th>Re-paid Date</th> 
            <th>Rate</th>
            <th>Paid Amount</th>
            <th colspan="2">Repayments</th>
            <th colspan="2">Interst Rate</th>
         </tr>
         <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
           
           
            <th>Repayment Per Instalment </th>
             <th>Total Repayments</th>

            <th>Instalment Rate</th>
            <th>Total Interst Rate</th>
           
         </tr>

        </thead>
        <tbody>
        @foreach($repayments as $repayment)
        <?php 
    $interset = new \App\User();
    $transfer = \App\Models\Transfer::find($repayment->loan_id);
     $result = $interset->interestProcessing($transfer);
     $id=$repayment->id;
     ?>
            <tr>
            <td>
            <a class="btn btn-info btn-md" href="/repayment/{{$repayment->repay_code}}" target="_blank">Repay Now</a>
            <a href="#" class='btn btn-primary btn-md ' onclick="event.preventDefault(); printThis(<?php echo $repayment->id; ?>);">
        <i class="glyphicon glyphicon-eye-open"></i> Invoice
    </a>
    <div id="receipt-content-{{$repayment->id}}" style="display: none"> 
            <div class="container">
            @include('receipt.repayment',['id', $id])
            </div>
    </div>
            </td>
            <td>{!! $repayment->repay_code !!}</td>
            <td>{!! $repayment->repayer !!}</td>
            <td>{!! $repayment->repay_date !!}</td>

                <td> {!! $transfer->rate !!}%</td>
                <td>{!! $repayment->currency !!} {!! $repayment->total_amount !!}</td>
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
        @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
			var printThis = function(id){
				document.getElementById('print-'+id).style.display="none";
                document.getElementById('receipt-content-'+id).style.display="block";
				var divToPrint=document.getElementById('receipt-content-'+id);
				var newWin=window.open('','Print-Window','scrollbars=yes,resizable=yes,width=950,height=1000');
				newWin.document.open();
				newWin.document.write('<html><head><title>Receipt</title><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="generator" content="Ganza respcie"><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1"><link rel="shortcut icon" href="/assets/images/a-1-122x30.png" type="image/x-icon"><meta name="description" content=""><link rel="stylesheet" href="/assets/web/assets/mobirise-icons/mobirise-icons.css"><link rel="stylesheet" href="/assets/web/assets/mobirise-icons2/mobirise2.css"><link rel="stylesheet" href="/assets/facebook-plugin/style.css"><link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-grid.min.css"><link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-reboot.min.css"> <link rel="stylesheet" href="/assets/tether/tether.min.css"><link rel="stylesheet" href="/assets/dropdown/css/style.css"><link rel="stylesheet" href="/assets/animatecss/animate.min.css"><link rel="stylesheet" href="/assets/theme/css/style.css"><link rel="stylesheet" href="/assets/gallery/style.css"><link rel="stylesheet" href="/assets/socicon/css/styles.css"><link rel="preload" as="style" href="/assets/mobirise/css/mbr-additional.css"> <link rel="stylesheet" href="/assets/mobirise/css/mbr-additional.css" type="text/css"> <style>.receipt-content .logo a:hover{text-decoration:none;color:#7793c4;font-family:Comfortaa,display}.receipt-content .invoice-wrapper{background:#fff;border:1px solid #cdd3e2;box-shadow:0 0 1px #ccc;padding:40px 40px 60px;margin-top:40px;border-radius:4px;font-family:Comfortaa,display}.receipt-content .invoice-wrapper .payment-details span{color:#a9b0bb;display:block;font-family:Comfortaa,display}.receipt-content .invoice-wrapper .payment-details a{display:inline-block;margin-top:5px}.receipt-content .invoice-wrapper .line-items .print a{display:inline-block;border:1px solid #9cb5d6;padding:13px 13px;border-radius:5px;color:#708dc0;font-size:13px;-webkit-transition:all .2s linear;-moz-transition:all .2s linear;-ms-transition:all .2s linear;-o-transition:all .2s linear;transition:all .2s linear}.receipt-content .invoice-wrapper .line-items .print a:hover{text-decoration:none;border-color:#333;color:#333}.receipt-content{background:#eceef4}@media (min-width:1200px){.receipt-content .container{width:900px}}.receipt-content .logo{text-align:center;margin-top:50px}.receipt-content .logo a{font-family:Comfortaa,display;font-size:36px;letter-spacing:.1px;color:#555;font-weight:300;-webkit-transition:all .2s linear;-moz-transition:all .2s linear;-ms-transition:all .2s linear;-o-transition:all .2s linear;transition:all .2s linear}.receipt-content .invoice-wrapper .intro{line-height:25px;color:#444}.receipt-content .invoice-wrapper .payment-info{margin-top:25px;padding-top:15px}.receipt-content .invoice-wrapper .payment-info span{color:#a9b0bb}.receipt-content .invoice-wrapper .payment-info strong{display:block;color:#444;margin-top:3px}@media (max-width:767px){.receipt-content .invoice-wrapper .payment-info .text-right{text-align:left;margin-top:20px}}.receipt-content .invoice-wrapper .payment-details{border-top:2px solid #ebecee;margin-top:30px;padding-top:20px;line-height:22px}@media (max-width:767px){.receipt-content .invoice-wrapper .payment-details .text-right{text-align:left;margin-top:20px}}.receipt-content .invoice-wrapper .line-items{margin-top:40px}.receipt-content .invoice-wrapper .line-items .headers{color:#a9b0bb;font-size:13px;letter-spacing:.3px;border-bottom:2px solid #ebecee;padding-bottom:4px}.receipt-content .invoice-wrapper .line-items .items{margin-top:8px;border-bottom:2px solid #ebecee;padding-bottom:8px}.receipt-content .invoice-wrapper .line-items .items .item{padding:10px 0;color:#696969;font-size:15px}@media (max-width:767px){.receipt-content .invoice-wrapper .line-items .items .item{font-size:13px}}.receipt-content .invoice-wrapper .line-items .items .item .amount{letter-spacing:.1px;color:#84868a;font-size:16px}@media (max-width:767px){.receipt-content .invoice-wrapper .line-items .items .item .amount{font-size:13px}}.receipt-content .invoice-wrapper .line-items .total{margin-top:30px}.receipt-content .invoice-wrapper .line-items .total .extra-notes{float:left;width:40%;text-align:left;font-size:13px;color:#7a7a7a;line-height:20px}@media (max-width:767px){.receipt-content .invoice-wrapper .line-items .total .extra-notes{width:100%;margin-bottom:30px;float:none}}.receipt-content .invoice-wrapper .line-items .total .extra-notes strong{display:block;margin-bottom:5px;color:#454545}.receipt-content .invoice-wrapper .line-items .total .field{margin-bottom:7px;font-size:14px;color:#555}.receipt-content .invoice-wrapper .line-items .total .field.grand-total{margin-top:10px;font-size:16px;font-weight:500}.receipt-content .invoice-wrapper .line-items .total .field.grand-total span{color:#20a720;font-size:16px}.receipt-content .invoice-wrapper .line-items .total .field span{display:inline-block;margin-left:20px;min-width:85px;color:#84868a;font-size:15px}.receipt-content .invoice-wrapper .line-items .print{margin-top:50px;text-align:center}.receipt-content .invoice-wrapper .line-items .print a i{margin-right:3px;font-size:14px}.receipt-content .footer{margin-top:40px;margin-bottom:110px;text-align:center;font-size:12px;color:#969cad}</style> </head><body  onload="window.print();"><section class="features17 cid-rYUhzEzUWQ text-left bg-white" id="features17-2w"> <div class="container">'+divToPrint.innerHTML+'</div></section></body></html>');
			
                newWin.document.close();
				document.getElementById('print-'+id).style.display="block";
                document.getElementById('receipt-content-'+id).style.display="none";
			};

			// function generateBarCode(id, amount){
			// 	var url = 'https://api.qrserver.com/v1/create-qr-code/?data='+amount+'&amp;size=100x100';
			// 	document.getElementById("barcode_"+id).setAttribute('src', url);
			// }
		</script>  
