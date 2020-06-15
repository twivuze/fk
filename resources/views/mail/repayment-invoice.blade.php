
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]-->
<!--[if !IE]><!-->
<html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Ganza respcie">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href='{{env("APP_URL", "https://alltrust.theeventx.com")}}/assets/images/a-1-122x30.png' type="image/x-icon">
    <meta name="description" content="">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Receipt</title>
   
    <style>

        
.receipt-content .logo a:hover {
  text-decoration: none;
  color: #7793C4; 
  font-family: 'Comfortaa', display;
}

.receipt-content .invoice-wrapper {
  background: #FFF;
  border: 1px solid #CDD3E2;
  box-shadow: 0px 0px 1px #CCC;
  padding: 20px 20px 40px;
  margin-top: 20px;
  border-radius: 4px; 
  font-family: 'Comfortaa', display;
}

.receipt-content .invoice-wrapper .payment-details span {
  color: #A9B0BB;
  display: block; 
  font-family: 'Comfortaa', display;
}
.receipt-content .invoice-wrapper .payment-details a {
  display: inline-block;
  margin-top: 5px; 
}

.receipt-content .invoice-wrapper .line-items .print a {
  display: inline-block;
  border: 1px solid #9CB5D6;
  padding: 13px 13px;
  border-radius: 5px;
  color: #708DC0;
  font-size: 13px;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -ms-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear; 
}

.receipt-content .invoice-wrapper .line-items .print a:hover {
  text-decoration: none;
  border-color: #333;
  color: #333; 
}

.receipt-content {
  background: #ECEEF4; 
}
@media (min-width: 1200px) {
  .receipt-content .container {width: 1200px; } 
}

.receipt-content .logo {
  text-align: center;
  margin-top: 50px; 
}

.receipt-content .logo a {
  font-family: 'Comfortaa', display;
  font-size: 36px;
  letter-spacing: .1px;
  color: #555;
  font-weight: 300;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -ms-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear; 
}

.receipt-content .invoice-wrapper .intro {
  line-height: 25px;
  color: #444; 
}

.receipt-content .invoice-wrapper .payment-info {
  margin-top: 25px;
  padding-top: 15px; 
}

.receipt-content .invoice-wrapper .payment-info span {
  color: #A9B0BB; 
}

.receipt-content .invoice-wrapper .payment-info strong {
  display: block;
  color: #444;
  margin-top: 3px; 
}

@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .payment-info .text-right {
  text-align: left;
  margin-top: 20px; } 
}
.receipt-content .invoice-wrapper .payment-details {
  border-top: 2px solid #EBECEE;
  margin-top: 30px;
  padding-top: 20px;
  line-height: 22px; 
}


@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .payment-details .text-right {
  text-align: left;
  margin-top: 20px; } 
}
.receipt-content .invoice-wrapper .line-items {
  margin-top: 40px; 
}
.receipt-content .invoice-wrapper .line-items .headers {
  color: #A9B0BB;
  font-size: 13px;
  letter-spacing: .3px;
  border-bottom: 2px solid #EBECEE;
  padding-bottom: 4px; 
}
.receipt-content .invoice-wrapper .line-items .items {
  margin-top: 8px;
  border-bottom: 2px solid #EBECEE;
  padding-bottom: 8px; 
}
.receipt-content .invoice-wrapper .line-items .items .item {
  padding: 10px 0;
  color: #696969;
  font-size: 15px; 
}
@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .line-items .items .item {
  font-size: 13px; } 
}
.receipt-content .invoice-wrapper .line-items .items .item .amount {
  letter-spacing: 0.1px;
  color: #84868A;
  font-size: 16px;
 }
@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .line-items .items .item .amount {
  font-size: 13px; } 
}

.receipt-content .invoice-wrapper .line-items .total {
  margin-top: 30px; 
}

.receipt-content .invoice-wrapper .line-items .total .extra-notes {
  float: left;
  width: 40%;
  text-align: left;
  font-size: 13px;
  color: #7A7A7A;
  line-height: 20px; 
}

@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .line-items .total .extra-notes {
  width: 100%;
  margin-bottom: 30px;
  float: none; } 
}

.receipt-content .invoice-wrapper .line-items .total .extra-notes strong {
  display: block;
  margin-bottom: 5px;
  color: #454545; 
}

.receipt-content .invoice-wrapper .line-items .total .field {
  margin-bottom: 7px;
  font-size: 14px;
  color: #555; 
}

.receipt-content .invoice-wrapper .line-items .total .field.grand-total {
  margin-top: 10px;
  font-size: 16px;
  font-weight: 500; 
}

.receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
  color: #20A720;
  font-size: 16px; 
}

.receipt-content .invoice-wrapper .line-items .total .field span {
  display: inline-block;
  margin-left: 20px;
  min-width: 85px;
  color: #84868A;
  font-size: 15px; 
}

.receipt-content .invoice-wrapper .line-items .print {
  margin-top: 50px;
  text-align: center; 
}



.receipt-content .invoice-wrapper .line-items .print a i {
  margin-right: 3px;
  font-size: 14px; 
}

.receipt-content .footer {
  margin-top: 40px;
  margin-bottom: 110px;
  text-align: center;
  font-size: 12px;
  color: #969CAD; 
}   
section, .container, .container-fluid {
    position: relative;
    word-wrap: break-word;
}
.row {
    display: -webkit-flex;
    -webkit-flex-wrap: wrap;
}
.cid-rYUfuivAPG {
    padding-top: 30px;
    padding-bottom: 0px;
    background-color: #ffffff;
}
.mt-5, .my-5 {
    margin-top: 3rem!important;
}
.mt-5, .my-5 {
    margin-top: 3rem!important;
}
@media (min-width: 576px)
{.container {
    max-width: 540px;
}}
.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
@media (min-width: 576px)
{.container {
    max-width: 540px;
}}
.cid-rYUhzEzUWQ {
    padding-top: 30px;
    padding-bottom: 30px;
    background-color: #efefef;
}
.text-left {
    text-align: left!important;
}
.bg-white {
    background-color: #fff!important;
}
section {
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: cover;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}
.col-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
}
.col-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%;
}
.col-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
}
.text-right {
    text-align: right!important;
}
.col-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
}
    </style>
</head>
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
                        <div class="intro">
                        <?php if($invoice->status=='successful'){?>
                        Dear <strong>{{$receipt->name}} </strong>, 
						<br>
                      
            Your loan repayment of {{$invoice->currency}} {{$invoice->total_amount}}) 
            to All Trust Consult has been completed successfully.
            <br>
            <br>
            Thank you for keeping your promise!<br>
            Your Friends in business from All Trust Consult!
            <?php } ?>
            <?php if($invoice->status=='pending' || $invoice->status=='outstanding'){ ?>
              Dear <strong>{{$receipt->name}}</strong>, 
              Your loan repayment of {{$invoice->currency}} {{$invoice->total_amount}}) is currently {{$invoice->status}}.<br >
              <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 4px;">
                                        <div class="btn btn--flat btn--small" style="text-align:center;">
              <a
                style="border-radius: 4px;display: inline-block;font-size: 11px;font-weight: bold;line-height: 19px;padding: 6px 12px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #ffffff !important;background-color: #3eb556;font-family: Georgia, serif;"
                                                href="{{env('APP_URL', 'http://alltrust.theeventx.com').'/repayment/'.$invoice->repay_code}}">Repay Now</a>
                                                </div>
                                                
                                                	</div>
             
               Thank you for keeping your promise!
            Your Friends in business from All Trust Consult!
            <?php } ?>
					</div>

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
                                    <div class="field">
                                      Rate <span> {!! $transfer->rate !!}%</span>
                                    </div>

                                    
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
                                          
                                      <th>Repayment per {{ $transfer->instalmentPeriod->name }} </th>
                                       <th>{!! $transfer->currency !!}  {{$result['amountToPay']+$result['totalInstalment']}} </th>
                                      </tr>
                                      <tr>
                                      <th>Total Repayment per {{ $transfer->recoverPeriod->name }}</th> 
                                      <th>{!! $transfer->currency !!}  {{$result['totalRepayment']}}</th>
                                      </tr>
                                      <tr>
                                      <th>Total Interest Rate per {{ $transfer->instalmentPeriod->name }}</th>
                                       <th>{{ $transfer->currency }} {{ $result['totalInstalment'] }} </th>
                                      </tr>
                                      <tr>
                                      <th>Total  Interest Rate per {{ $transfer->recoverPeriod->name }}</th>
                                       <th>{{ $transfer->currency }} {{ $result['totalRecover']}} </th>
                                          
                                        </tr>
                                      </thead>
                                      
                                 </table>

                                    </div>
                                </div>


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
</div>

</body>

</html>