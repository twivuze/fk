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
            <th colspan="2">Repayment Amount</th>
            <th colspan="2">Interst </th>
         </tr>
         <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
           
            <th>Instalment </th>
            <th>Recover Period </th>
            
            <th>Instalment </th>
            <th>Recover Period </th>
           
         </tr>

        </thead>
        <tbody>
        @foreach($repayments as $repayment)
        <?php 
    $interset = new \App\User();
    $transfer = \App\Models\Transfer::find($repayment->loan_id);
     $result = $interset->interestProcessing($transfer);
     ?>
            <tr>
            <td>
            <a class="btn btn-info" href="">Repay Now</a></td>
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
