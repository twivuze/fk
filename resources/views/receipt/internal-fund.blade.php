
<?php 
 $invoice = \App\Models\InternalFunder::find($id);
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
                                    <strong>{{  $invoice->created_at }}</strong>
                                    <span>Receipt No.</span>
                                    <strong>{{$invoice->code}}</strong>
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
                                            <th>{{$invoice->currency}} {{$invoice->fund}}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="line-items">
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
                                        Loan Internal Fund
                                    </div>
                                    <div class="col-2 qty">
                                        1
                                    </div>
                                    <div class="col-5 amount text-right">
                                    {{$invoice->currency}} {{$invoice->fund}}
                                    </div>
                                </div>


                                <div class="total text-right">
                                    <p class="extra-notes">
                                        <strong>Extra Notes</strong>

                                        Thanks a lot.
                                    </p>
                                    <div class="field">
                                        Subtotal <span>{{$invoice->currency}} {{$invoice->fund}}</span>
                                    </div>
                                    <!-- <div class="field">
								Shipping <span>$0.00</span>
							</div>
							<div class="field">
								Discount <span>4.5%</span>
							</div> -->
                                    <div class="field grand-total" style="font-weight:500">
                                        Total <span>{{$invoice->currency}} {{$invoice->fund}}</span>
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
